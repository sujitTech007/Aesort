<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Device;
use App\Models\Site;
use App\Models\User;
use App\Models\DeviceReading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RolloutController extends Controller
{
    public function index()
    {
        $freshnessNow = now();
        $sitesMissingContext = Site::query()
            ->whereNull('portfolio_name')->orWhere('portfolio_name', '')
            ->orWhereNull('province')->orWhere('province', '')
            ->orWhereNull('heating_fuel')->orWhere('heating_fuel', '')
            ->orWhereNull('operating_hours')->orWhere('operating_hours', '')
            ->orWhereNull('timezone')->orWhere('timezone', '')
            ->count();
        $devicesMissingReports = Device::whereNull('last_active')->count();
        $devicesLateReports = Device::whereNotNull('last_active')->get(['last_active', 'reading_interval_minutes'])
            ->filter(function ($device) use ($freshnessNow) {
                $expectedMinutes = $device->reading_interval_minutes
                    ? max((int) $device->reading_interval_minutes * 2, 60)
                    : 1440;

                return $device->last_active->lt($freshnessNow->copy()->subMinutes($expectedMinutes));
            })
            ->count();
        $anomalyReadings = DeviceReading::where('status', 'anomaly')->count();

        return view('admin.rollout-workbench', [
            'sites' => Site::orderBy('name')->get(['id', 'name', 'user_id']),
            'devices' => Device::orderBy('name')->get(['id', 'name', 'site_id', 'serial_number']),
            'users' => User::orderBy('name')->get(['id', 'name', 'email']),
            'admins' => Admin::orderBy('name')->get(['id', 'name', 'email']),
            'adminCount' => Admin::count(),
            'baselines' => DB::table('energy_baselines')->orderByDesc('created_at')->paginate(10, ['*'], 'baselines_page')->withQueryString(),
            'approvedBaselines' => DB::table('energy_baselines')->where('status', 'approved')->orderByDesc('approved_at')->get(),
            'savingsMeasures' => DB::table('savings_measures')->leftJoin('sites', 'sites.id', '=', 'savings_measures.site_id')->select('savings_measures.*', 'sites.name as site_name')->orderByDesc('savings_measures.updated_at')->paginate(10, ['*'], 'savings_page')->withQueryString(),
            'recommendations' => DB::table('recommendations')->leftJoin('sites', 'sites.id', '=', 'recommendations.site_id')->select('recommendations.*', 'sites.name as site_name')->orderByRaw("FIELD(recommendations.status, 'open', 'in_progress', 'completed', 'dismissed')")->orderByDesc('recommendations.created_at')->paginate(10, ['*'], 'recommendations_page')->withQueryString(),
            'onboardingProjects' => DB::table('onboarding_projects')->leftJoin('users', 'users.id', '=', 'onboarding_projects.user_id')->leftJoin('sites', 'sites.id', '=', 'onboarding_projects.site_id')->select('onboarding_projects.*', 'users.name as user_name', 'sites.name as site_name')->orderByDesc('onboarding_projects.updated_at')->paginate(10, ['*'], 'onboarding_page')->withQueryString(),
            'benchmarks' => DB::table('benchmark_versions')->orderByDesc('created_at')->paginate(10, ['*'], 'benchmarks_page')->withQueryString(),
            'incidents' => DB::table('operational_incidents')->leftJoin('sites', 'sites.id', '=', 'operational_incidents.site_id')->leftJoin('devices', 'devices.id', '=', 'operational_incidents.device_id')->select('operational_incidents.*', 'sites.name as site_name', 'devices.name as device_name')->orderByRaw("FIELD(operational_incidents.status, 'open', 'investigating', 'resolved', 'closed')")->orderByDesc('operational_incidents.occurred_at')->paginate(10, ['*'], 'incidents_page')->withQueryString(),
            'integrations' => DB::table('integration_health_checks')->orderByDesc('checked_at')->paginate(10, ['*'], 'integrations_page')->withQueryString(),
            'roles' => DB::table('roles')->where('guard_name', 'admin')->orderBy('name')->get(),
            'roleAssignments' => DB::table('admin_role')->join('roles', 'roles.id', '=', 'admin_role.role_id')->join('admins', 'admins.id', '=', 'admin_role.admin_id')->select('admin_role.*', 'roles.name as role_name', 'admins.name as user_name', 'admins.email as user_email')->orderBy('admins.name')->get(),
            'auditLogs' => DB::table('admin_audit_logs')->orderByDesc('created_at')->paginate(25, ['*'], 'audit_page')->withQueryString(),
            'qualityMetrics' => [
                'Sites missing operating context' => $sitesMissingContext,
                'Devices with no reports' => $devicesMissingReports,
                'Devices with late reports' => $devicesLateReports,
                'Flagged reading anomalies' => $anomalyReadings,
            ],
        ]);
    }

    public function storeBaseline(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'required|exists:sites,id',
            'name' => 'required|string|max:255',
            'period_start' => 'required|date',
            'period_end' => 'required|date|after_or_equal:period_start',
            'methodology' => 'required|string|max:2000',
            'baseline_kwh' => 'required|numeric|gt:0',
        ]);

        $id = DB::table('energy_baselines')->insertGetId($data + [
            'status' => 'pending_approval',
            'created_by' => Auth::guard('admin')->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->audit('energy_baseline', $id, 'submitted_for_approval', 'Baseline proposal submitted.', null, $data);

        return back()->with('success', 'Baseline submitted for independent approval.');
    }

    public function reviewBaseline(Request $request, int $id)
    {
        $data = $request->validate([
            'decision' => ['required', Rule::in(['approved', 'rejected'])],
            'approval_note' => 'required|string|min:8|max:2000',
        ]);
        $baseline = DB::table('energy_baselines')->where('id', $id)->firstOrFail();
        $adminCount = Admin::count();
        $sameReviewer = (int) $baseline->created_by === (int) Auth::guard('admin')->id();
        abort_if($sameReviewer && $adminCount > 1, 403, 'A different administrator must review this baseline.');
        abort_unless($baseline->status === 'pending_approval', 409, 'Only pending baselines can be reviewed.');

        DB::table('energy_baselines')->where('id', $id)->update([
            'status' => $data['decision'],
            'approved_by' => Auth::guard('admin')->id(),
            'approved_at' => now(),
            'approval_note' => $data['approval_note'],
            'updated_at' => now(),
        ]);
        $reviewNote = $sameReviewer && $adminCount === 1
            ? '[SINGLE-ADMIN EXCEPTION] ' . $data['approval_note']
            : $data['approval_note'];
        $this->audit('energy_baseline', $id, $data['decision'], $reviewNote, ['status' => $baseline->status], ['status' => $data['decision']]);

        return back()->with('success', 'Baseline review saved.');
    }

    public function storeSavingsMeasure(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'required|exists:sites,id',
            'baseline_id' => 'nullable|exists:energy_baselines,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'estimated_savings_kwh' => 'nullable|numeric|min:0',
            'estimated_cost_savings' => 'nullable|numeric|min:0',
            'currency_code' => 'required|string|size:3',
            'evidence' => 'nullable|string|max:5000',
        ]);
        if (!empty($data['baseline_id'])) {
            abort_unless(DB::table('energy_baselines')->where('id', $data['baseline_id'])->where('status', 'approved')->exists(), 422, 'Savings measures require an approved baseline.');
        }

        $id = DB::table('savings_measures')->insertGetId($data + [
            'stage' => 'identified',
            'owner_id' => Auth::guard('admin')->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->audit('savings_measure', $id, 'identified', 'Measure identified.', null, $data);

        return back()->with('success', 'Savings measure recorded as Identified.');
    }

    public function updateSavingsStage(Request $request, int $id)
    {
        $data = $request->validate([
            'stage' => ['required', Rule::in(['estimated', 'implemented', 'verified'])],
            'stage_note' => 'required|string|min:8|max:2000',
            'verified_savings_kwh' => 'nullable|numeric|gt:0',
        ]);
        $measure = DB::table('savings_measures')->where('id', $id)->firstOrFail();
        $allowed = ['identified' => 'estimated', 'estimated' => 'implemented', 'implemented' => 'verified'];
        abort_unless(($allowed[$measure->stage] ?? null) === $data['stage'], 422, 'Savings stages must advance one step at a time.');
        if ($data['stage'] === 'verified') {
            abort_unless($measure->baseline_id && DB::table('energy_baselines')->where('id', $measure->baseline_id)->where('status', 'approved')->exists(), 422, 'An approved baseline is required for verification.');
            $request->validate(['verified_savings_kwh' => 'required|numeric|gt:0']);
        }

        DB::table('savings_measures')->where('id', $id)->update([
            'stage' => $data['stage'],
            'verified_savings_kwh' => $data['stage'] === 'verified' ? $data['verified_savings_kwh'] : $measure->verified_savings_kwh,
            'evidence' => trim(($measure->evidence ?? '') . "\n[" . now()->toDateTimeString() . '] ' . $data['stage_note']),
            'verified_by' => $data['stage'] === 'verified' ? Auth::guard('admin')->id() : $measure->verified_by,
            'verified_at' => $data['stage'] === 'verified' ? now() : $measure->verified_at,
            'updated_at' => now(),
        ]);
        $this->audit('savings_measure', $id, $data['stage'], $data['stage_note'], ['stage' => $measure->stage], ['stage' => $data['stage']]);

        return back()->with('success', 'Savings evidence stage advanced to ' . ucfirst($data['stage']) . '.');
    }

    public function storeRecommendation(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'nullable|exists:sites,id',
            'device_id' => 'nullable|exists:devices,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'priority' => ['required', Rule::in(['low', 'medium', 'high', 'critical'])],
            'assigned_to' => 'nullable|integer',
            'due_date' => 'nullable|date',
        ]);
        $id = DB::table('recommendations')->insertGetId($data + ['status' => 'open', 'created_at' => now(), 'updated_at' => now()]);
        $this->audit('recommendation', $id, 'created', 'Recommendation created.', null, $data);

        return back()->with('success', 'Recommendation created.');
    }

    public function updateRecommendation(Request $request, int $id)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['open', 'in_progress', 'completed', 'dismissed'])],
            'completion_note' => 'required|string|min:4|max:2000',
        ]);
        $item = DB::table('recommendations')->where('id', $id)->firstOrFail();
        DB::table('recommendations')->where('id', $id)->update([
            'status' => $data['status'],
            'completion_note' => $data['completion_note'],
            'completed_at' => $data['status'] === 'completed' ? now() : null,
            'updated_at' => now(),
        ]);
        $this->audit('recommendation', $id, $data['status'], $data['completion_note'], ['status' => $item->status], ['status' => $data['status']]);

        return back()->with('success', 'Recommendation status updated.');
    }

    public function storeOnboarding(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'site_id' => 'nullable|exists:sites,id',
            'stage' => ['required', Rule::in(['lead', 'poc_scoping', 'poc_active', 'installation', 'data_validation', 'active', 'closed'])],
            'success_criteria' => 'nullable|string|max:3000',
            'target_date' => 'nullable|date',
        ]);
        $id = DB::table('onboarding_projects')->insertGetId($data + ['owner_id' => Auth::guard('admin')->id(), 'activated_at' => $data['stage'] === 'active' ? now() : null, 'created_at' => now(), 'updated_at' => now()]);
        $this->audit('onboarding_project', $id, 'created', 'POC/onboarding project created.', null, $data);

        return back()->with('success', 'Onboarding project created.');
    }

    public function updateOnboarding(Request $request, int $id)
    {
        $data = $request->validate([
            'stage' => ['required', Rule::in(['lead', 'poc_scoping', 'poc_active', 'installation', 'data_validation', 'active', 'closed'])],
            'success_criteria' => 'nullable|string|max:3000',
            'target_date' => 'nullable|date',
        ]);
        $project = DB::table('onboarding_projects')->where('id', $id)->firstOrFail();
        DB::table('onboarding_projects')->where('id', $id)->update($data + ['activated_at' => $data['stage'] === 'active' ? ($project->activated_at ?? now()) : $project->activated_at, 'updated_at' => now()]);
        $this->audit('onboarding_project', $id, 'stage_changed', 'Onboarding stage changed.', ['stage' => $project->stage], ['stage' => $data['stage']]);

        return back()->with('success', 'Onboarding stage updated.');
    }

    public function storeBenchmark(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'sector' => 'nullable|string|max:120',
            'metric' => 'required|string|max:120',
            'unit' => 'required|string|max:32',
            'region' => 'nullable|string|max:120',
            'benchmark_value' => 'required|numeric',
            'source_citation' => 'required|string|max:1000',
            'version' => 'required|string|max:40',
            'effective_from' => 'required|date',
            'effective_to' => 'nullable|date|after_or_equal:effective_from',
        ]);
        $id = DB::table('benchmark_versions')->insertGetId($data + ['status' => 'draft', 'created_by' => Auth::guard('admin')->id(), 'created_at' => now(), 'updated_at' => now()]);
        $this->audit('benchmark_version', $id, 'draft_created', 'Benchmark version created as draft.', null, $data);

        return back()->with('success', 'Benchmark saved as draft; approval is required before use.');
    }

    public function approveBenchmark(Request $request, int $id)
    {
        $data = $request->validate(['approval_note' => 'required|string|min:8|max:2000']);
        $benchmark = DB::table('benchmark_versions')->where('id', $id)->firstOrFail();
        abort_unless($benchmark->status === 'draft', 409, 'Only draft benchmarks can be approved.');
        $adminCount = Admin::count();
        $sameReviewer = (int) $benchmark->created_by === (int) Auth::guard('admin')->id();
        abort_if($sameReviewer && $adminCount > 1, 403, 'A different administrator must approve this benchmark.');
        DB::table('benchmark_versions')->where('id', $id)->update(['status' => 'approved', 'approved_by' => Auth::guard('admin')->id(), 'approved_at' => now(), 'updated_at' => now()]);
        $approvalNote = $sameReviewer && $adminCount === 1
            ? '[SINGLE-ADMIN EXCEPTION] ' . $data['approval_note']
            : $data['approval_note'];
        $this->audit('benchmark_version', $id, 'approved', $approvalNote, ['status' => $benchmark->status], ['status' => 'approved']);

        return back()->with('success', 'Benchmark version approved.');
    }

    public function storeIncident(Request $request)
    {
        $data = $request->validate([
            'site_id' => 'nullable|exists:sites,id',
            'device_id' => 'nullable|exists:devices,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'severity' => ['required', Rule::in(['low', 'medium', 'high', 'critical'])],
            'occurred_at' => 'required|date',
        ]);
        $id = DB::table('operational_incidents')->insertGetId($data + ['status' => 'open', 'created_at' => now(), 'updated_at' => now()]);
        $this->audit('incident', $id, 'opened', 'Incident opened.', null, $data);

        return back()->with('success', 'Incident recorded.');
    }

    public function updateIncident(Request $request, int $id)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(['open', 'investigating', 'resolved', 'closed'])],
            'resolution_note' => 'required|string|min:5|max:2000',
        ]);
        $incident = DB::table('operational_incidents')->where('id', $id)->firstOrFail();
        DB::table('operational_incidents')->where('id', $id)->update($data + ['resolved_at' => in_array($data['status'], ['resolved', 'closed'], true) ? now() : null, 'updated_at' => now()]);
        $this->audit('incident', $id, $data['status'], $data['resolution_note'], ['status' => $incident->status], ['status' => $data['status']]);

        return back()->with('success', 'Incident status updated.');
    }

    public function recordIntegrationCheck(Request $request)
    {
        $data = $request->validate([
            'integration_name' => 'required|string|max:255',
            'integration_type' => 'required|string|max:40',
            'status' => ['required', Rule::in(['healthy', 'degraded', 'failed', 'unknown'])],
            'details' => 'nullable|string|max:3000',
        ]);
        $id = DB::table('integration_health_checks')->insertGetId($data + ['checked_at' => now(), 'created_at' => now(), 'updated_at' => now()]);
        $this->audit('integration_health_check', $id, $data['status'], 'Manual integration health check recorded.', null, $data);

        return back()->with('success', 'Integration health check recorded.');
    }

    public function assignRole(Request $request)
    {
        $data = $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'role_id' => 'required|exists:roles,id',
        ]);
        abort_unless(DB::table('roles')->where('id', $data['role_id'])->where('guard_name', 'admin')->exists(), 422, 'Select an admin role.');
        DB::table('admin_role')->updateOrInsert($data);
        $this->audit('admin_role', $data['admin_id'], 'assigned', 'AESORT admin role assigned.', null, $data);

        return back()->with('success', 'Role assignment saved.');
    }

    private function audit(string $entityType, ?int $entityId, string $event, ?string $reason, ?array $before, ?array $after): void
    {
        DB::table('admin_audit_logs')->insert([
            'admin_id' => Auth::guard('admin')->id(),
            'entity_type' => $entityType,
            'entity_id' => $entityId,
            'event' => $event,
            'reason' => $reason,
            'before_values' => $before ? json_encode($before) : null,
            'after_values' => $after ? json_encode($after) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
