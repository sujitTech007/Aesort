@include('admin.include.header')

<div class="page-content">
    <div class="page-title-head d-flex flex-wrap align-items-center gap-3">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-1">AESORT Rollout Workbench</h4>
            <p class="text-muted mb-0">Baselines, savings evidence, onboarding, actions, benchmarks, incidents, integrations and roles.</p>
        </div>
    </div>

    <div class="page-container">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger">Please correct the highlighted form errors and try again.</div>@endif

        <nav class="d-flex flex-wrap gap-2 mb-4" aria-label="Rollout workbench sections">
            @foreach(['quality' => 'Data Quality', 'baselines' => 'Baselines', 'savings' => 'Savings', 'onboarding' => 'POC & Onboarding', 'recommendations' => 'Recommendations', 'benchmarks' => 'Benchmarks', 'incidents' => 'Incidents', 'integrations' => 'Integrations', 'roles' => 'Roles', 'audit' => 'Audit'] as $anchor => $label)
                <a class="btn btn-sm btn-light" href="#{{ $anchor }}">{{ $label }}</a>
            @endforeach
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.reports.customer-portfolio') }}"><i class="ri-download-2-line me-1"></i>Customer CSV</a>
        </nav>

        <section id="quality" class="mb-4">
            <h5 class="fw-bold mb-3">Data quality &amp; reporting freshness</h5>
            <div class="alert alert-info">Freshness is derived from device last-report timestamps and expected intervals; anomaly counts are stored reading flags. Site completeness checks the context fields currently available. No energy values are synthesized.</div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-3">
                @foreach($qualityMetrics as $label => $count)
                    <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted small">{{ $label }}</div><div class="fs-3 fw-bold mt-2">{{ number_format($count) }}</div></div></div></div>
                @endforeach
            </div>
        </section>

        <section id="baselines" class="mb-4">
            <h5 class="fw-bold mb-3">Baseline management</h5>
            <div class="card mb-3"><div class="card-body">
                <form method="POST" action="{{ route('admin.rollout.baselines.store') }}" class="row g-2 align-items-end">
                    @csrf
                    <div class="col-md-3"><label class="form-label">Site</label><select name="site_id" class="form-select" required><option value="">Choose site</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                    <div class="col-md-3"><label class="form-label">Baseline name</label><input name="name" class="form-control" required></div>
                    <div class="col-md-2"><label class="form-label">Period start</label><input type="date" name="period_start" class="form-control" required></div>
                    <div class="col-md-2"><label class="form-label">Period end</label><input type="date" name="period_end" class="form-control" required></div>
                    <div class="col-md-2"><label class="form-label">Baseline energy (kWh)</label><input type="number" min="0.001" step="0.001" name="baseline_kwh" class="form-control" required></div>
                    <div class="col-md-10"><label class="form-label">Methodology / source</label><input name="methodology" class="form-control" placeholder="Data source, adjustments, exclusions and assumptions" required></div>
                    <div class="col-md-2"><button class="btn btn-primary w-100">Submit baseline</button></div>
                </form>
            </div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Site</th><th>Name</th><th>Period</th><th>kWh</th><th>Methodology</th><th>Status / review</th></tr></thead><tbody>
                @forelse($baselines as $baseline)
                    <tr><td>{{ $sites->firstWhere('id', $baseline->site_id)->name ?? 'Unknown site' }}</td><td>{{ $baseline->name }}</td><td>{{ $baseline->period_start }} – {{ $baseline->period_end }}</td><td>{{ number_format($baseline->baseline_kwh, 3) }}</td><td>{{ $baseline->methodology }}</td><td>
                        <span class="badge bg-{{ $baseline->status === 'approved' ? 'success' : ($baseline->status === 'rejected' ? 'danger' : 'warning') }}-subtle text-{{ $baseline->status === 'approved' ? 'success' : ($baseline->status === 'rejected' ? 'danger' : 'warning') }}">{{ str_replace('_', ' ', $baseline->status) }}</span>
                        @if($baseline->status === 'pending_approval')
                            <form method="POST" action="{{ route('admin.rollout.baselines.review', $baseline->id) }}" class="mt-2 d-flex gap-1">@csrf<select name="decision" class="form-select form-select-sm"><option value="approved">Approve</option><option value="rejected">Reject</option></select><input name="approval_note" class="form-control form-control-sm" placeholder="Review note" minlength="8" required><button class="btn btn-sm btn-outline-primary">Save</button></form>
                        @endif
                    </td></tr>
                @empty<tr><td colspan="6" class="text-center text-muted py-3">No baselines recorded.</td></tr>@endforelse
            </tbody></table></div><div class="card-body">{{ $baselines->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="savings" class="mb-4">
            <h5 class="fw-bold mb-3">Savings evidence and verification</h5>
            <div class="alert alert-info">Savings amounts are operational records, not automatically calculated. Verified stage requires an approved baseline and a recorded evidence note.</div>
            <div class="card mb-3"><div class="card-body">
                <form method="POST" action="{{ route('admin.rollout.savings.store') }}" class="row g-2 align-items-end">
                    @csrf
                    <div class="col-md-2"><label class="form-label">Site</label><select name="site_id" class="form-select" required><option value="">Choose</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                    <div class="col-md-2"><label class="form-label">Approved baseline</label><select name="baseline_id" class="form-select"><option value="">None</option>@foreach($approvedBaselines as $baseline)<option value="{{ $baseline->id }}">{{ $baseline->name }} (site {{ $baseline->site_id }})</option>@endforeach</select></div>
                    <div class="col-md-2"><label class="form-label">Measure</label><input name="title" class="form-control" required></div>
                    <div class="col-md-2"><label class="form-label">Estimated kWh</label><input name="estimated_savings_kwh" type="number" min="0" step="0.001" class="form-control"></div>
                    <div class="col-md-2"><label class="form-label">Estimated cost saved</label><input name="estimated_cost_savings" type="number" min="0" step="0.01" class="form-control"></div>
                    <div class="col-md-2"><label class="form-label">Currency</label><select name="currency_code" class="form-select"><option>USD</option><option>CAD</option></select></div>
                    <div class="col-md-10"><label class="form-label">Description / evidence</label><input name="description" class="form-control" placeholder="Describe the measure; cite evidence when available"></div>
                    <div class="col-md-2"><button class="btn btn-primary w-100">Record identified</button></div>
                </form>
            </div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Site</th><th>Measure</th><th>Stage</th><th>Estimate</th><th>Verified</th><th>Advance stage</th></tr></thead><tbody>
                @forelse($savingsMeasures as $measure)
                    <tr><td>{{ $measure->site_name ?? 'Unknown site' }}</td><td>{{ $measure->title }}<div class="small text-muted">{{ $measure->description }}</div><div class="small">{{ $measure->evidence }}</div></td><td>{{ ucfirst($measure->stage) }}</td><td>{{ $measure->estimated_savings_kwh !== null ? number_format($measure->estimated_savings_kwh, 3) . ' kWh' : '—' }}</td><td>{{ $measure->verified_savings_kwh !== null ? number_format($measure->verified_savings_kwh, 3) . ' kWh' : '—' }}</td><td>
                        @php($nextStage = ['identified' => 'estimated', 'estimated' => 'implemented', 'implemented' => 'verified'][$measure->stage] ?? null)
                        @if($nextStage)<form method="POST" action="{{ route('admin.rollout.savings.stage', $measure->id) }}" class="d-flex flex-column gap-1">@csrf<input type="hidden" name="stage" value="{{ $nextStage }}"><input name="stage_note" class="form-control form-control-sm" placeholder="Evidence / reason" minlength="8" required>@if($nextStage === 'verified')<input name="verified_savings_kwh" type="number" min="0.001" step="0.001" class="form-control form-control-sm" placeholder="Verified kWh" required>@endif<button class="btn btn-sm btn-outline-primary">Mark {{ $nextStage }}</button></form>@else<span class="text-success">Verification complete</span>@endif
                    </td></tr>
                @empty<tr><td colspan="6" class="text-center text-muted py-3">No savings measures recorded.</td></tr>@endforelse
            </tbody></table></div><div class="card-body">{{ $savingsMeasures->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="onboarding" class="mb-4">
            <h5 class="fw-bold mb-3">POC &amp; onboarding funnel</h5>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.onboarding.store') }}" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-3"><label class="form-label">Customer</label><select name="user_id" class="form-select" required><option value="">Choose customer</option>@foreach($users as $user)<option value="{{ $user->id }}">{{ $user->name }} · {{ $user->email }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Site</label><select name="site_id" class="form-select"><option value="">Not assigned</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Stage</label><select name="stage" class="form-select">@foreach(['lead','poc_scoping','poc_active','installation','data_validation','active','closed'] as $stage)<option value="{{ $stage }}">{{ str_replace('_',' ',ucfirst($stage)) }}</option>@endforeach</select></div>
                <div class="col-md-3"><label class="form-label">Success criteria</label><input name="success_criteria" class="form-control"></div>
                <div class="col-md-1"><label class="form-label">Target</label><input type="date" name="target_date" class="form-control"></div>
                <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Customer</th><th>Site</th><th>Stage</th><th>Criteria</th><th>Target</th><th>Update stage</th></tr></thead><tbody>@forelse($onboardingProjects as $project)<tr><td>{{ $project->user_name ?? 'Unknown' }}</td><td>{{ $project->site_name ?? 'Unassigned' }}</td><td>{{ str_replace('_',' ',ucfirst($project->stage)) }}</td><td>{{ $project->success_criteria }}</td><td>{{ $project->target_date ?: '—' }}</td><td><form method="POST" action="{{ route('admin.rollout.onboarding.update',$project->id) }}" class="d-flex gap-1">@csrf<select name="stage" class="form-select form-select-sm">@foreach(['lead','poc_scoping','poc_active','installation','data_validation','active','closed'] as $stage)<option value="{{ $stage }}" @selected($project->stage === $stage)>{{ str_replace('_',' ',ucfirst($stage)) }}</option>@endforeach</select><input type="hidden" name="success_criteria" value="{{ $project->success_criteria }}"><input type="hidden" name="target_date" value="{{ $project->target_date }}"><button class="btn btn-sm btn-outline-primary">Save</button></form></td></tr>@empty<tr><td colspan="6" class="text-center text-muted py-3">No onboarding projects.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $onboardingProjects->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="recommendations" class="mb-4">
            <h5 class="fw-bold mb-3">Recommendations &amp; actions</h5>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.recommendations.store') }}" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-2"><label class="form-label">Site</label><select name="site_id" class="form-select"><option value="">None</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Device</label><select name="device_id" class="form-select"><option value="">None</option>@foreach($devices as $device)<option value="{{ $device->id }}">{{ $device->name }} ({{ $device->serial_number }})</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Title</label><input name="title" class="form-control" required></div>
                <div class="col-md-2"><label class="form-label">Priority</label><select name="priority" class="form-select">@foreach(['low','medium','high','critical'] as $priority)<option>{{ $priority }}</option>@endforeach</select></div>
                <div class="col-md-3"><label class="form-label">Action / rationale</label><input name="description" class="form-control" required></div>
                <div class="col-md-1"><button class="btn btn-primary w-100">Add</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Site</th><th>Title</th><th>Priority</th><th>Status</th><th>Update</th></tr></thead><tbody>@forelse($recommendations as $item)<tr><td>{{ $item->site_name ?? '—' }}</td><td>{{ $item->title }}<div class="small text-muted">{{ $item->description }}</div></td><td>{{ ucfirst($item->priority) }}</td><td>{{ str_replace('_',' ',ucfirst($item->status)) }}</td><td><form method="POST" action="{{ route('admin.rollout.recommendations.update',$item->id) }}" class="d-flex gap-1">@csrf<select name="status" class="form-select form-select-sm">@foreach(['open','in_progress','completed','dismissed'] as $status)<option value="{{ $status }}" @selected($item->status === $status)>{{ str_replace('_',' ',ucfirst($status)) }}</option>@endforeach</select><input name="completion_note" class="form-control form-control-sm" placeholder="Action note" required><button class="btn btn-sm btn-outline-primary">Save</button></form></td></tr>@empty<tr><td colspan="5" class="text-center text-muted py-3">No recommendations recorded.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $recommendations->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="benchmarks" class="mb-4">
            <h5 class="fw-bold mb-3">Benchmark library / versions</h5>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.benchmarks.store') }}" class="row g-2 align-items-end">
                @csrf
                @foreach(['name'=>'Name','sector'=>'Sector','metric'=>'Metric','unit'=>'Unit','region'=>'Region','benchmark_value'=>'Value','source_citation'=>'Source / citation','version'=>'Version'] as $field=>$label)<div class="col-md-3"><label class="form-label">{{ $label }}</label><input name="{{ $field }}" class="form-control" @if(in_array($field,['name','metric','unit','benchmark_value','source_citation','version'])) required @endif></div>@endforeach
                <div class="col-md-2"><label class="form-label">Effective from</label><input type="date" name="effective_from" class="form-control" required></div>
                <div class="col-md-2"><label class="form-label">Effective to</label><input type="date" name="effective_to" class="form-control"></div>
                <div class="col-md-2"><button class="btn btn-primary w-100">Save draft</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Benchmark</th><th>Metric/value</th><th>Region/sector</th><th>Version/source</th><th>Effective</th><th>Approval</th></tr></thead><tbody>@forelse($benchmarks as $benchmark)<tr><td>{{ $benchmark->name }}</td><td>{{ $benchmark->metric }}: {{ $benchmark->benchmark_value }} {{ $benchmark->unit }}</td><td>{{ $benchmark->region }} / {{ $benchmark->sector }}</td><td>v{{ $benchmark->version }}<div class="small">{{ $benchmark->source_citation }}</div></td><td>{{ $benchmark->effective_from }} – {{ $benchmark->effective_to ?: 'open' }}</td><td>{{ ucfirst($benchmark->status) }} @if($benchmark->status === 'draft')<form method="POST" action="{{ route('admin.rollout.benchmarks.approve',$benchmark->id) }}" class="mt-1 d-flex gap-1">@csrf<input name="approval_note" class="form-control form-control-sm" placeholder="Approval rationale" required><button class="btn btn-sm btn-outline-success">Approve</button></form>@endif</td></tr>@empty<tr><td colspan="6" class="text-center text-muted py-3">No benchmark versions recorded.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $benchmarks->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="incidents" class="mb-4">
            <h5 class="fw-bold mb-3">Trust &amp; critical incidents</h5>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.incidents.store') }}" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-2"><label class="form-label">Site</label><select name="site_id" class="form-select"><option value="">None</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Device</label><select name="device_id" class="form-select"><option value="">None</option>@foreach($devices as $device)<option value="{{ $device->id }}">{{ $device->name }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Severity</label><select name="severity" class="form-select">@foreach(['low','medium','high','critical'] as $severity)<option>{{ $severity }}</option>@endforeach</select></div>
                <div class="col-md-2"><label class="form-label">Occurred at</label><input type="datetime-local" name="occurred_at" class="form-control" required></div>
                <div class="col-md-4"><label class="form-label">Incident title</label><input name="title" class="form-control" required></div>
                <div class="col-md-10"><label class="form-label">Description / customer impact</label><input name="description" class="form-control" required></div>
                <div class="col-md-2"><button class="btn btn-danger w-100">Record incident</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>When</th><th>Site/device</th><th>Incident</th><th>Severity</th><th>Status/update</th></tr></thead><tbody>@forelse($incidents as $incident)<tr><td>{{ $incident->occurred_at }}</td><td>{{ $incident->site_name ?? '—' }} / {{ $incident->device_name ?? '—' }}</td><td>{{ $incident->title }}<div class="small text-muted">{{ $incident->description }}</div></td><td>{{ ucfirst($incident->severity) }}</td><td><form method="POST" action="{{ route('admin.rollout.incidents.update',$incident->id) }}" class="d-flex gap-1">@csrf<select name="status" class="form-select form-select-sm">@foreach(['open','investigating','resolved','closed'] as $status)<option value="{{ $status }}" @selected($incident->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select><input name="resolution_note" class="form-control form-control-sm" placeholder="Resolution / update note" required><button class="btn btn-sm btn-outline-primary">Save</button></form></td></tr>@empty<tr><td colspan="5" class="text-center text-muted py-3">No incidents recorded.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $incidents->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="integrations" class="mb-4">
            <h5 class="fw-bold mb-3">Integration health checks</h5>
            <div class="alert alert-warning">Checks are recorded manually; this page does not automatically probe external integrations.</div>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.integrations.store') }}" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-3"><label class="form-label">Integration</label><input name="integration_name" class="form-control" required></div>
                <div class="col-md-2"><label class="form-label">Type</label><input name="integration_type" class="form-control" placeholder="API, device gateway" required></div>
                <div class="col-md-2"><label class="form-label">Status</label><select name="status" class="form-select">@foreach(['healthy','degraded','failed','unknown'] as $status)<option>{{ $status }}</option>@endforeach</select></div>
                <div class="col-md-4"><label class="form-label">Details</label><input name="details" class="form-control"></div>
                <div class="col-md-1"><button class="btn btn-primary w-100">Log</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Integration</th><th>Type</th><th>Status</th><th>Checked</th><th>Details</th></tr></thead><tbody>@forelse($integrations as $check)<tr><td>{{ $check->integration_name }}</td><td>{{ $check->integration_type }}</td><td>{{ ucfirst($check->status) }}</td><td>{{ $check->checked_at ?: '—' }}</td><td>{{ $check->details }}</td></tr>@empty<tr><td colspan="5" class="text-center text-muted py-3">No health checks recorded.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $integrations->links('pagination::bootstrap-5') }}</div></div>
        </section>

        <section id="roles" class="mb-4">
            <h5 class="fw-bold mb-3">AESORT roles</h5>
            <div class="alert alert-info">Admin role assignments are enforced on rollout routes. Keep the AESORT Super Admin role limited to trusted administrators.</div>
            <div class="card mb-3"><div class="card-body"><form method="POST" action="{{ route('admin.rollout.roles.assign') }}" class="row g-2 align-items-end">
                @csrf
                <div class="col-md-5"><label class="form-label">Administrator</label><select name="admin_id" class="form-select" required><option value="">Choose</option>@foreach($admins as $admin)<option value="{{ $admin->id }}">{{ $admin->name }} · {{ $admin->email }}</option>@endforeach</select></div>
                <div class="col-md-5"><label class="form-label">Role</label><select name="role_id" class="form-select" required><option value="">Choose</option>@foreach($roles as $role)<option value="{{ $role->id }}">{{ $role->name }}</option>@endforeach</select></div>
                <div class="col-md-2"><button class="btn btn-primary w-100">Assign role</button></div>
            </form></div></div>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>User</th><th>Email</th><th>Assigned AESORT role</th></tr></thead><tbody>@forelse($roleAssignments as $assignment)<tr><td>{{ $assignment->user_name }}</td><td>{{ $assignment->user_email }}</td><td>{{ $assignment->role_name }}</td></tr>@empty<tr><td colspan="3" class="text-center text-muted py-3">No role assignments yet.</td></tr>@endforelse</tbody></table></div></div>
        </section>

        <section id="audit" class="mb-4">
            <h5 class="fw-bold mb-3">Audit history</h5>
            <div class="card"><div class="table-responsive"><table class="table table-hover mb-0"><thead><tr><th>Time</th><th>Admin</th><th>Entity</th><th>Event</th><th>Reason</th></tr></thead><tbody>@forelse($auditLogs as $log)<tr><td>{{ $log->created_at }}</td><td>{{ $log->admin_id ?? '—' }}</td><td>{{ $log->entity_type }} #{{ $log->entity_id }}</td><td>{{ str_replace('_',' ',ucfirst($log->event)) }}</td><td>{{ $log->reason }}</td></tr>@empty<tr><td colspan="5" class="text-center text-muted py-3">No audit events have been recorded yet.</td></tr>@endforelse</tbody></table></div><div class="card-body">{{ $auditLogs->links('pagination::bootstrap-5') }}</div></div>
        </section>
    </div>
</div>

@include('admin.include.footer')
