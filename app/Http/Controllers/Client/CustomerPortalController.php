<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceReading;
use App\Models\Notification;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CustomerPortalController extends Controller
{
    public function analytics(Request $request)
    {
        $data = $request->validate([
            'portfolio' => 'nullable|string|max:150',
            'site_id' => 'nullable|integer',
            'period' => 'nullable|in:30d,90d,12m',
            'start_date' => 'nullable|date_format:Y-m-d|before_or_equal:today',
            'end_date' => 'nullable|date_format:Y-m-d|after_or_equal:start_date|before_or_equal:today',
        ]);
        $userId = Auth::id();
        $allSites = Site::where('user_id', $userId)->where('is_demo', false)->orderBy('name')->get();
        $portfolios = $allSites->pluck('portfolio_name')->filter()->unique()->sort()->values();
        $portfolioSites = $allSites;
        if (!empty($data['portfolio'])) {
            abort_unless($portfolios->contains($data['portfolio']), 404);
            $portfolioSites = $allSites->where('portfolio_name', $data['portfolio'])->values();
        }
        $selectedSite = null;
        if (!empty($data['site_id'])) {
            $selectedSite = $portfolioSites->firstWhere('id', (int) $data['site_id']);
            abort_unless($selectedSite, 404);
        }

        $period = $data['period'] ?? '30d';
        $periodEnd = isset($data['end_date']) ? Carbon::createFromFormat('Y-m-d', $data['end_date'])->endOfDay() : now()->endOfDay();
        if (isset($data['start_date'])) {
            $periodStart = Carbon::createFromFormat('Y-m-d', $data['start_date'])->startOfDay();
        } else {
            $periodStart = match ($period) {
                '90d' => $periodEnd->copy()->subDays(89)->startOfDay(),
                '12m' => $periodEnd->copy()->subMonths(11)->startOfMonth(),
                default => $periodEnd->copy()->subDays(29)->startOfDay(),
            };
        }

        $sites = $selectedSite ? collect([$selectedSite]) : $portfolioSites;
        $siteIds = $sites->pluck('id');
        $devices = Device::with('site')->whereIn('site_id', $siteIds)->orderBy('name')->get();
        $deviceIds = $devices->pluck('id');
        $readingQuery = DeviceReading::with('device.site')
            ->whereIn('device_id', $deviceIds)
            ->whereBetween('reading_time', [$periodStart, $periodEnd]);
        $latestReading = (clone $readingQuery)->orderByDesc('reading_time')->first();
        $readingCount = (clone $readingQuery)->count();
        $averagePower = (clone $readingQuery)->whereNotNull('power')->avg('power');
        $averageVoltage = (clone $readingQuery)->whereNotNull('voltage')->avg('voltage');
        $averageTemperature = (clone $readingQuery)->whereNotNull('temperature')->avg('temperature');
        $anomalies = (clone $readingQuery)->where('status', 'anomaly')->orderByDesc('reading_time')->limit(20)->get();

        $powerTrend = DB::table('device_readings')
            ->selectRaw('DATE(reading_time) as reading_day, AVG(power) as average_power, COUNT(*) as sample_count')
            ->whereIn('device_id', $deviceIds)
            ->whereBetween('reading_time', [$periodStart, $periodEnd])
            ->whereNotNull('power')
            ->groupByRaw('DATE(reading_time)')
            ->orderBy('reading_day')
            ->get();

        $freshestReport = $devices->whereNotNull('last_active')->max('last_active');
        $devicesWithoutReports = $devices->whereNull('last_active')->count();
        $lateDevices = $devices->filter(function ($device) {
            if (!$device->last_active) {
                return false;
            }
            $staleMinutes = $device->reading_interval_minutes
                ? max((int) $device->reading_interval_minutes * 2, 60)
                : 1440;

            return $device->last_active->lt(now()->subMinutes($staleMinutes));
        })->count();

        $baselines = DB::table('energy_baselines')
            ->whereIn('site_id', $siteIds)
            ->where('status', 'approved')
            ->where('is_demo', false)
            ->whereDate('period_start', '<=', $periodEnd->toDateString())
            ->whereDate('period_end', '>=', $periodStart->toDateString())
            ->orderByDesc('approved_at')
            ->get();
        $benchmarks = DB::table('benchmark_versions')
            ->where('status', 'approved')
            ->where('is_demo', false)
            ->whereDate('effective_from', '<=', $periodEnd->toDateString())
            ->where(function ($query) use ($periodStart) {
                $query->whereNull('effective_to')->orWhereDate('effective_to', '>=', $periodStart->toDateString());
            })
            ->orderBy('sector')
            ->orderBy('name')
            ->get();
        $baselineComparisons = $baselines->map(function ($baseline) use ($sites, $benchmarks) {
            $site = $sites->firstWhere('id', $baseline->site_id);
            $baselineEui = $site && (float) $site->area_sqft > 0
                ? (float) $baseline->baseline_kwh / (float) $site->area_sqft
                : null;
            $benchmark = $benchmarks->first(function ($candidate) use ($site) {
                return $site
                    && $candidate->metric === 'energy_intensity'
                    && strtolower($candidate->unit) === 'kwh/sqft'
                    && (!$candidate->sector || strtolower($candidate->sector) === strtolower($site->type));
            });

            $benchmarkGap = $baselineEui !== null && $benchmark
                ? $baselineEui - (float) $benchmark->benchmark_value
                : null;

            return (object) ['baseline' => $baseline, 'site' => $site, 'baseline_eui' => $baselineEui, 'benchmark' => $benchmark, 'benchmark_gap' => $benchmarkGap];
        });
        $verifiedSavings = DB::table('savings_measures')
            ->whereIn('site_id', $siteIds)
            ->where('is_demo', false)
            ->orderByDesc('verified_at')
            ->get();
        $recommendations = DB::table('recommendations')
            ->leftJoin('sites', 'sites.id', '=', 'recommendations.site_id')
            ->leftJoin('devices', 'devices.id', '=', 'recommendations.device_id')
            ->leftJoin('admins', 'admins.id', '=', 'recommendations.assigned_to')
            ->whereIn('recommendations.site_id', $siteIds)
            ->where('recommendations.is_demo', false)
            ->whereNotIn('recommendations.status', ['dismissed'])
            ->select('recommendations.*', 'sites.name as site_name', 'devices.name as device_name', 'admins.name as owner_name')
            ->orderByRaw("FIELD(recommendations.status, 'open', 'in_progress', 'completed')")
            ->orderBy('recommendations.due_date')
            ->get();
        $incidents = DB::table('operational_incidents')
            ->leftJoin('sites', 'sites.id', '=', 'operational_incidents.site_id')
            ->leftJoin('devices', 'devices.id', '=', 'operational_incidents.device_id')
            ->whereIn('operational_incidents.site_id', $siteIds)
            ->where('operational_incidents.is_demo', false)
            ->whereNotIn('operational_incidents.status', ['closed'])
            ->select('operational_incidents.*', 'sites.name as site_name', 'devices.name as device_name')
            ->orderByDesc('operational_incidents.occurred_at')
            ->get();
        $onboarding = DB::table('onboarding_projects')
            ->where('user_id', $userId)
            ->where('is_demo', false)
            ->orderByDesc('updated_at')
            ->get();
        $unreadNotifications = Notification::where('user_id', $userId)->where('is_read', false)->count();
        $periodLabel = $periodStart->format('M d, Y') . ' – ' . $periodEnd->format('M d, Y');
        $metricCards = [
            ['label' => 'Reading samples', 'value' => number_format($readingCount), 'icon' => 'ri-pulse-line'],
            ['label' => 'Average recorded power', 'value' => $averagePower !== null ? number_format($averagePower, 2) . ' kW' : 'N/A', 'icon' => 'ri-flashlight-line'],
            ['label' => 'Average voltage', 'value' => $averageVoltage !== null ? number_format($averageVoltage, 1) . ' V' : 'N/A', 'icon' => 'ri-plug-line'],
            ['label' => 'Average temperature', 'value' => $averageTemperature !== null ? number_format($averageTemperature, 1) . ' °C' : 'N/A', 'icon' => 'ri-temp-hot-line'],
        ];

        return view('client.portfolio-analytics', compact(
            'allSites', 'portfolios', 'portfolioSites', 'sites', 'selectedSite', 'period', 'periodStart', 'periodEnd', 'periodLabel',
            'devices', 'latestReading', 'readingCount', 'averagePower', 'averageVoltage', 'averageTemperature',
            'powerTrend', 'freshestReport', 'devicesWithoutReports', 'lateDevices', 'anomalies',
            'baselines', 'benchmarks', 'baselineComparisons', 'metricCards', 'verifiedSavings', 'recommendations', 'incidents', 'onboarding', 'unreadNotifications'
        ));
    }

    public function acknowledgeRecommendation(Request $request, int $id)
    {
        return $this->recordCustomerAction($request, 'recommendations', $id, 'Recommendation acknowledged by customer.');
    }

    public function acknowledgeIncident(Request $request, int $id)
    {
        return $this->recordCustomerAction($request, 'operational_incidents', $id, 'Operational incident acknowledged by customer.');
    }

    public function reports()
    {
        $reports = DB::table('customer_value_reports')
            ->where('user_id', Auth::id())
            ->orderByDesc('generated_at')
            ->paginate(20);
        $sites = Site::where('user_id', Auth::id())->where('is_demo', false)->orderBy('name')->get(['id', 'name']);

        return view('client.value-reports', compact('reports', 'sites'));
    }

    public function generateReport(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'nullable|integer',
            'start_date' => 'required|date_format:Y-m-d|before_or_equal:today',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date|before_or_equal:today',
            'format' => 'required|in:csv,pdf',
        ]);
        $sitesQuery = Site::where('user_id', Auth::id())->where('is_demo', false);
        if (!empty($data['site_id'])) {
            $sitesQuery->where('id', $data['site_id']);
        }
        $sites = $sitesQuery->get();
        abort_if(!empty($data['site_id']) && $sites->isEmpty(), 404);
        $siteIds = $sites->pluck('id');
        $deviceIds = Device::whereIn('site_id', $siteIds)->pluck('id');
        $start = Carbon::createFromFormat('Y-m-d', $data['start_date'])->startOfDay();
        $end = Carbon::createFromFormat('Y-m-d', $data['end_date'])->endOfDay();
        $readings = DeviceReading::whereIn('device_id', $deviceIds)->whereBetween('reading_time', [$start, $end]);
        $summary = [
            'customer' => Auth::user()->name,
            'generated_at' => now(),
            'period_start' => $start->toDateString(),
            'period_end' => $end->toDateString(),
            'site_scope' => $sites->isEmpty() ? 'No sites' : $sites->pluck('name')->implode(', '),
            'reading_count' => (clone $readings)->count(),
            'average_power' => (clone $readings)->whereNotNull('power')->avg('power'),
            'latest_reading' => (clone $readings)->max('reading_time'),
            'comparison_note' => 'Actual energy-to-baseline comparison is unavailable until interval-versus-cumulative meter semantics are verified. Weather-normalized analysis is unavailable because weather/occupancy inputs are not connected.',
            'savings_note' => 'Savings are not inferred from telemetry. Review the customer analytics page for approved savings stages and verification evidence.',
        ];
        $filename = 'customer-reports/' . Str::uuid() . '.' . $data['format'];

        if ($data['format'] === 'pdf') {
            $contents = \Barryvdh\DomPDF\Facade\Pdf::loadView('client.pdf.value-report', compact('summary'))
                ->setPaper('a4', 'portrait')
                ->output();
        } else {
            $handle = fopen('php://temp', 'r+');
            fputcsv($handle, ['AESORT customer value report']);
            fputcsv($handle, ['Customer', $summary['customer']]);
            fputcsv($handle, ['Generated at', $summary['generated_at']->toIso8601String()]);
            fputcsv($handle, ['Reporting period', $summary['period_start'], $summary['period_end']]);
            fputcsv($handle, ['Site scope', $summary['site_scope']]);
            fputcsv($handle, ['Stored readings', $summary['reading_count']]);
            fputcsv($handle, ['Average recorded power (kW)', $summary['average_power']]);
            fputcsv($handle, ['Latest reading time', $summary['latest_reading']]);
            fputcsv($handle, ['Baseline / benchmark comparison', $summary['comparison_note']]);
            fputcsv($handle, ['Savings figures', $summary['savings_note']]);
            rewind($handle);
            $contents = stream_get_contents($handle);
            fclose($handle);
        }

        abort_unless(Storage::disk('local')->put($filename, $contents), 500, 'The report could not be saved.');
        $reportId = DB::table('customer_value_reports')->insertGetId([
            'user_id' => Auth::id(),
            'site_id' => $data['site_id'] ?? null,
            'period_start' => $start->toDateString(),
            'period_end' => $end->toDateString(),
            'format' => $data['format'],
            'file_path' => $filename,
            'generated_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('client.value-reports.download', $reportId)->with('success', strtoupper($data['format']) . ' value report generated.');
    }

    public function downloadReport(int $id)
    {
        $report = DB::table('customer_value_reports')->where('user_id', Auth::id())->find($id);
        abort_unless($report && Storage::disk('local')->exists($report->file_path), 404);

        return response()->streamDownload(
            fn () => print Storage::disk('local')->get($report->file_path),
            'aesort-value-report-' . $report->period_start . '-to-' . $report->period_end . '.' . $report->format,
            ['Content-Type' => $report->format === 'pdf' ? 'application/pdf' : 'text/csv; charset=UTF-8']
        );
    }

    private function recordCustomerAction(Request $request, string $table, int $id, string $reason)
    {
        $data = $request->validate(['customer_note' => 'required|string|min:4|max:2000']);
        $userId = Auth::id();
        $record = DB::table($table)
            ->where('id', $id)
            ->where('is_demo', false)
            ->whereExists(function ($query) use ($table, $userId) {
                $query->selectRaw('1')->from('sites')->whereColumn('sites.id', $table . '.site_id')->where('sites.user_id', $userId)->where('sites.is_demo', false);
            })
            ->first();
        abort_unless($record, 404);

        DB::transaction(function () use ($table, $id, $record, $data, $reason, $userId) {
            DB::table($table)->where('id', $id)->update([
                'customer_acknowledged_at' => $record->customer_acknowledged_at ?? now(),
                'customer_note' => $data['customer_note'],
                'updated_at' => now(),
            ]);
            DB::table('admin_audit_logs')->insert([
                'admin_id' => null,
                'entity_type' => $table === 'recommendations' ? 'recommendation' : 'incident',
                'entity_id' => $id,
                'event' => 'customer_acknowledged',
                'reason' => $reason,
                'before_values' => json_encode(['customer_acknowledged_at' => $record->customer_acknowledged_at, 'customer_note' => $record->customer_note]),
                'after_values' => json_encode(['user_id' => $userId, 'customer_acknowledged_at' => $record->customer_acknowledged_at ?? now(), 'customer_note' => $data['customer_note']]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return back()->with('success', 'Your acknowledgement and note were recorded.');
    }
}
