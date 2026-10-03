@php($pageTitle = 'Customer Dashboard - AESORT')
@include('client.include.header')

<div class="page-content">
    <div class="container">
        <div class="row g-3">
            <aside class="col-lg-3">@include('client.include.sidebar-nav')</aside>
            <main class="col-lg-9">
                <div class="page-content-col">
                    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-4">
                        <div>
                            <h1 class="fs-3 fw-bold mb-1">Customer dashboard</h1>
                            <p class="text-muted mb-0">Live records for {{ auth()->user()->name }}. Sample analytics are kept separate.</p>
                        </div>
                        <a href="{{ route('client.analytics') }}" class="btn btn-primary"><i class="ri-line-chart-line me-1"></i>Portfolio analytics</a>
                    </div>

                    <form method="GET" action="{{ route('client.dashboard') }}" class="card mb-3">
                        <div class="card-body d-flex flex-wrap align-items-end gap-2">
                            <div style="min-width:220px">
                                <label class="form-label" for="dashboard-site">Site scope</label>
                                <select id="dashboard-site" name="site_id" class="form-select">
                                    <option value="">All my sites</option>
                                    @foreach($allSites as $site)
                                        <option value="{{ $site->id }}" {{ (string) request('site_id') === (string) $site->id ? 'selected' : '' }}>{{ $site->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="min-width:170px">
                                <label class="form-label" for="dashboard-period">Reporting period</label>
                                <select id="dashboard-period" name="period" class="form-select">
                                    <option value="30d" {{ $period === '30d' ? 'selected' : '' }}>Last 30 days</option>
                                    <option value="90d" {{ $period === '90d' ? 'selected' : '' }}>Last 90 days</option>
                                    <option value="12m" {{ $period === '12m' ? 'selected' : '' }}>Last 12 months</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-primary" type="submit"><i class="ri-filter-3-line me-1"></i>Apply</button>
                            @if(request()->hasAny(['site_id', 'period']))<a class="btn btn-link" href="{{ route('client.dashboard') }}">Clear</a>@endif
                        </div>
                    </form>

                    @if($sites->isEmpty())
                        <div class="alert alert-secondary d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div><strong>No customer sites are registered yet.</strong><div class="small">Create your first site to begin connecting devices and receiving real measurements. No demo values are shown here.</div></div>
                            <a href="{{ route('client.sites') }}" class="btn btn-outline-primary">Set up a site</a>
                        </div>
                    @endif

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-4">
                        @foreach([
                            ['Sites in scope', $sites->count(), 'ri-building-2-line'],
                            ['Devices in scope', $devices->count(), 'ri-cpu-line'],
                            ['Stored readings', number_format($totalReadings), 'ri-pulse-line'],
                            ['Open customer actions', number_format($actionCount), 'ri-task-line'],
                        ] as [$label, $value, $icon])
                            <div class="col"><div class="card h-100"><div class="card-body d-flex justify-content-between gap-2"><div><div class="small text-muted">{{ $label }}</div><div class="fs-3 fw-bold mt-2">{{ $value }}</div></div><i class="{{ $icon }} fs-3 text-primary"></i></div></div></div>
                        @endforeach
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-xl-7">
                            <section class="card h-100">
                                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center gap-2">
                                    <h2 class="h6 mb-0">Latest recorded measurement</h2>
                                    <a href="{{ route('client.energy-readings') }}" class="small">Reading history</a>
                                </div>
                                @if($latestReading)
                                    <div class="card-body">
                                        <div class="small text-muted mb-3">Reporting period: {{ $periodLabel }} · {{ $latestReading->device->site->name ?? 'Site unavailable' }} / {{ $latestReading->device->name ?? 'Device unavailable' }} · {{ $latestReading->reading_time?->format('M d, Y H:i') ?? 'Timestamp unavailable' }}</div>
                                        <div class="row row-cols-2 row-cols-md-3 g-3">
                                            <div class="col"><div class="small text-muted">Power</div><strong>{{ $latestReading->power !== null ? number_format($latestReading->power, 2) . ' kW' : 'N/A' }}</strong></div>
                                            <div class="col"><div class="small text-muted">Energy reading</div><strong>{{ $latestReading->energy !== null ? number_format($latestReading->energy, 2) . ' kWh' : 'N/A' }}</strong></div>
                                            <div class="col"><div class="small text-muted">Voltage</div><strong>{{ $latestReading->voltage !== null ? number_format($latestReading->voltage, 1) . ' V' : 'N/A' }}</strong></div>
                                        </div>
                                        <div class="small text-muted mt-3">Source: stored device reading · status {{ ucfirst($latestReading->status ?: 'unknown') }}. This is a point reading, not a calculated reporting-period total.</div>
                                    </div>
                                @else
                                    <div class="card-body text-muted">N/A · No real device readings have been received for this customer/site scope during {{ $periodLabel }}.</div>
                                @endif
                            </section>
                        </div>
                        <div class="col-xl-5">
                            <section class="card h-100">
                                <div class="card-header bg-transparent"><h2 class="h6 mb-0">Data freshness</h2></div>
                                <div class="card-body">
                                    @if($latestReportAt)
                                        <p class="mb-1">Latest device report: <strong>{{ \Carbon\Carbon::parse($latestReportAt)->format('M d, Y H:i') }}</strong></p>
                                        <p class="text-muted small mb-2">{{ $devices->whereNull('last_active')->count() }} device(s) have no report timestamp.</p>
                                    @else
                                        <p class="mb-2">N/A · No device report timestamps are available.</p>
                                    @endif
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-light text-secondary border">{{ $unreadNotifications }} unread notification(s)</span>
                                        @if($onboarding)<span class="badge bg-info-subtle text-info-emphasis">Onboarding: {{ str_replace('_', ' ', ucfirst($onboarding->stage)) }}</span>@else<span class="badge bg-light text-secondary border">Onboarding status: Not recorded</span>@endif
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <section class="card">
                        <div class="card-header bg-transparent d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <h2 class="h6 mb-0">My portfolio</h2>
                            <a href="{{ route('client.sites') }}" class="small">Manage sites</a>
                        </div>
                        @if($sites->isNotEmpty())
                            <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Site</th><th>Portfolio</th><th>Location</th><th>Area</th><th>Data context</th></tr></thead><tbody>
                                @foreach($sites->take(8) as $site)
                                    @php($contextComplete = filled($site->portfolio_name) && filled($site->province) && filled($site->heating_fuel) && filled($site->operating_hours) && filled($site->timezone))
                                    <tr><td><strong>{{ $site->name }}</strong><div class="small text-muted">{{ ucfirst($site->type ?: 'type not recorded') }}</div></td><td>{{ $site->portfolio_name ?: 'N/A' }}</td><td>{{ collect([$site->city, $site->province, $site->country])->filter()->implode(', ') ?: 'N/A' }}</td><td>{{ $site->area_sqft ? number_format($site->area_sqft) . ' sq ft' : 'N/A' }}</td><td><span class="badge {{ $contextComplete ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">{{ $contextComplete ? 'Complete' : 'Incomplete' }}</span></td></tr>
                                @endforeach
                            </tbody></table></div>
                        @else
                            <div class="card-body text-muted">Add a site to see portfolio context here.</div>
                        @endif
                    </section>

                    @if($actionCount > 0 || $unreadNotifications > 0)
                        <div class="d-flex flex-wrap gap-2 mt-3"><a href="{{ route('client.analytics') }}#actions" class="btn btn-outline-primary">Review actions ({{ $actionCount }})</a><a href="{{ route('client.notifications') }}" class="btn btn-outline-secondary">Notifications ({{ $unreadNotifications }})</a></div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>

@include('client.include.footer')
