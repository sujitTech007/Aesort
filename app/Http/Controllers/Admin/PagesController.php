<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceReading;
use App\Models\Site;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function clients()
    {
        return view('admin.clients-management');
    }

   public function subscriptionPurchase(Request $request)
{
    // Start query with relationships
    $query = Subscription::with(['site', 'plan', 'user']);

    // Apply search if 'keyword' is present
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;
        $query->where(function ($q) use ($keyword) {
            $q->whereHas('user', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%")
                   ->orWhere('email', 'like', "%{$keyword}%");
            })
            ->orWhereHas('site', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('plan', function ($q2) use ($keyword) {
                $q2->where('name', 'like', "%{$keyword}%");
            })
            ->orWhere('amount', 'like', "%{$keyword}%")
            ->orWhere('status', 'like', "%{$keyword}%")
            ->orWhere('stripe_subscription_id', 'like', "%{$keyword}%");
        });
    }

    // Paginate results and keep search query in URL
    $subscriptions = $query->orderBy('created_at', 'desc')
                           ->paginate(10)
                           ->withQueryString();

    return view('admin.billing-and-subscription', compact('subscriptions'));
}

    public function technicians()
    {
        return view('admin.technician-management');
    }

    public function sites()
    {
        return view('admin.sites-management');
    }

    public function devices()
    {
        return view('admin.devices-and-sensors');
    }

    public function reports()
    {
        $summary = [
            'Customers' => User::where('role', 1)->count(),
            'Sites' => Site::count(),
            'Devices' => Device::count(),
            'Stored energy readings' => DeviceReading::count(),
            'Approved baselines' => DB::table('energy_baselines')->where('status', 'approved')->count(),
            'Savings measures awaiting verification' => DB::table('savings_measures')->where('stage', 'implemented')->count(),
            'Open recommendations' => DB::table('recommendations')->whereIn('status', ['open', 'in_progress'])->count(),
            'Open critical incidents' => DB::table('operational_incidents')->where('severity', 'critical')->whereIn('status', ['open', 'investigating'])->count(),
        ];

        return view('admin.rollout-reports', compact('summary'));
    }

    public function customerPortfolioExport()
    {
        $clients = User::where('role', 1)->with('sites')->orderBy('name')->get();
        $adminId = Auth::guard('admin')->id();
        $filename = 'aesort-customer-portfolio-' . now()->format('Ymd-His') . '.csv';

        DB::table('admin_audit_logs')->insert([
            'admin_id' => $adminId,
            'entity_type' => 'customer_report',
            'entity_id' => null,
            'event' => 'csv_exported',
            'reason' => 'Customer and site portfolio report downloaded.',
            'after_values' => json_encode(['customer_count' => $clients->count(), 'generated_at' => now()->toIso8601String()]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->streamDownload(function () use ($clients) {
            $output = fopen('php://output', 'w');
            fputcsv($output, ['Customer', 'Email', 'Company', 'Account status', 'Portfolio', 'Site', 'Province / State', 'City', 'Country', 'Area sq ft', 'Site type', 'Timezone', 'Heating fuel', 'Operating hours', 'Data completeness']);

            foreach ($clients as $client) {
                if ($client->sites->isEmpty()) {
                    fputcsv($output, [$client->name, $client->email, $client->company_name, $client->status == 1 ? 'Active' : 'Inactive', '', '', '', '', '', '', '', '', '', '', 'No site']);
                    continue;
                }

                foreach ($client->sites as $site) {
                    $complete = filled($site->portfolio_name) && filled($site->province) && filled($site->area_sqft) && filled($site->type) && filled($site->timezone) && filled($site->heating_fuel) && filled($site->operating_hours);
                    fputcsv($output, [$client->name, $client->email, $client->company_name, $client->status == 1 ? 'Active' : 'Inactive', $site->portfolio_name, $site->name, $site->province, $site->city, $site->country, $site->area_sqft, $site->type, $site->timezone, $site->heating_fuel, $site->operating_hours, $complete ? 'Complete' : 'Incomplete']);
                }
            }

            fclose($output);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function energySavingsEvidence()
    {
        $totalSites = Site::count();
        $totalDevices = Device::count();
        $totalReadings = DeviceReading::count();
        $latestReading = DeviceReading::query()->orderByDesc('reading_time')->first();

        $avgVoltage = DeviceReading::query()->whereNotNull('voltage')->avg('voltage');
        $avgPower = DeviceReading::query()->whereNotNull('power')->avg('power');
        $avgEnergy = DeviceReading::query()->whereNotNull('energy')->avg('energy');

        return view('admin.energy-savings-evidence', compact(
            'totalSites',
            'totalDevices',
            'totalReadings',
            'latestReading',
            'avgVoltage',
            'avgPower',
            'avgEnergy'
        ));
    }

    public function notifications()
    {
        return view('admin.notifications');
    }

    public function billing()
    {
        return view('admin.billing-and-subscription');
    }

    public function users()
    {
        $users = User::withCount('sites')->orderByDesc('id')->paginate(25);
        $totalUsers = User::count();
        $customerCount = User::where('role', 1)->count();
        $technicianCount = User::where('role', 2)->count();
        $unmappedRoleCount = User::whereNotIn('role', [1, 2])->count();

        return view('admin.user-directory', compact('users', 'totalUsers', 'customerCount', 'technicianCount', 'unmappedRoleCount'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
