@php($pageTitle = 'Portfolio Analytics - AESORT')
@include('client.include.header')

<div class="page-content">
    <div class="container">
        <div class="row g-3">
            <aside class="col-lg-3">@include('client.include.sidebar-nav')</aside>
            <main class="col-lg-9">
                <div class="page-content-col">
                    <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-3">
                        <div><h1 class="fs-3 fw-bold mb-1">Portfolio analytics</h1><p class="text-muted mb-0">Live customer readings and approved records · {{ $periodLabel }}</p></div>
                        <a href="{{ route('client.value-reports') }}" class="btn btn-outline-primary"><i class="ri-file-download-line me-1"></i>Value reports</a>
                    </div>
                    <div class="alert alert-light border">This page uses your stored site/device records only. Analytics Demo sample values are not included.</div>

                    <form method="GET" action="{{ route('client.analytics') }}" class="card mb-3">
                        <div class="card-body row g-2 align-items-end">
                            <div class="col-md-2"><label for="analytics-portfolio" class="form-label">Portfolio</label><select id="analytics-portfolio" name="portfolio" class="form-select"><option value="">All portfolios</option>@foreach($portfolios as $portfolio)<option value="{{ $portfolio }}" {{ request('portfolio') === $portfolio ? 'selected' : '' }}>{{ $portfolio }}</option>@endforeach</select></div>
                            <div class="col-md-3"><label for="analytics-site" class="form-label">Site</label><select id="analytics-site" name="site_id" class="form-select"><option value="">All sites in scope</option>@foreach($portfolioSites as $site)<option value="{{ $site->id }}" {{ (string) request('site_id') === (string) $site->id ? 'selected' : '' }}>{{ $site->name }}</option>@endforeach</select></div>
                            <div class="col-md-2"><label for="analytics-period" class="form-label">Period</label><select id="analytics-period" name="period" class="form-select"><option value="30d" {{ $period === '30d' ? 'selected' : '' }}>Last 30 days</option><option value="90d" {{ $period === '90d' ? 'selected' : '' }}>Last 90 days</option><option value="12m" {{ $period === '12m' ? 'selected' : '' }}>Last 12 months</option></select></div>
                            <div class="col-md-2"><label for="start-date" class="form-label">From</label><input id="start-date" name="start_date" type="date" value="{{ request('start_date') }}" class="form-control"></div>
                            <div class="col-md-2"><label for="end-date" class="form-label">To</label><input id="end-date" name="end_date" type="date" value="{{ request('end_date') }}" class="form-control"></div>
                            <div class="col-md-1 d-grid"><button class="btn btn-primary" type="submit" aria-label="Apply filters"><i class="ri-filter-3-line"></i></button></div>
                        </div>
                    </form>

                    @if($sites->isNotEmpty())
                        <div class="small text-muted mb-3">Site context: @foreach($sites as $contextSite){{ $contextSite->name }} ({{ $contextSite->type ?: 'type N/A' }}, {{ $contextSite->area_sqft ? number_format($contextSite->area_sqft) . ' sq ft' : 'area N/A' }}, fuel {{ $contextSite->heating_fuel ?: 'N/A' }}, hours {{ $contextSite->operating_hours ?: 'N/A' }}){{ !$loop->last ? ' · ' : '' }}@endforeach</div>
                    @endif

                    @if($allSites->isEmpty())
                        <div class="alert alert-secondary d-flex flex-wrap justify-content-between align-items-center gap-3"><div><strong>No sites to analyze.</strong><div class="small">Add a site and connect a device before expecting telemetry or portfolio comparisons.</div></div><a class="btn btn-outline-primary" href="{{ route('client.sites') }}">Set up a site</a></div>
                    @endif

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3 mb-3">
                        @foreach($metricCards as $metricCard)
                            <div class="col"><div class="card h-100"><div class="card-body"><div class="d-flex justify-content-between gap-2"><span class="small text-muted">{{ $metricCard['label'] }}</span><i class="{{ $metricCard['icon'] }} text-primary"></i></div><div class="fs-4 fw-bold mt-2">{{ $metricCard['value'] }}</div></div></div></div>
                        @endforeach
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-8"><section class="card h-100">
                            <div class="card-header bg-transparent d-flex flex-wrap justify-content-between gap-2"><h2 class="h6 mb-0">Recorded power trend</h2><span class="small text-muted">Daily average of stored power values (kW) · {{ $periodLabel }}</span></div>
                            @if($powerTrend->isNotEmpty())
                                <div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Day</th><th class="text-end">Average power (kW)</th><th class="text-end">Samples</th><th>Data status</th></tr></thead><tbody>@foreach($powerTrend as $point)<tr><td>{{ \Carbon\Carbon::parse($point->reading_day)->format('M d, Y') }}</td><td class="text-end">{{ number_format($point->average_power, 2) }}</td><td class="text-end">{{ number_format($point->sample_count) }}</td><td><span class="badge bg-success-subtle text-success">Recorded</span></td></tr>@endforeach</tbody></table></div>
                            @else
                                <div class="card-body text-muted">N/A · No recorded power readings in this reporting period.</div>
                            @endif
                        </section></div>
                        <div class="col-lg-4"><section class="card h-100"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Freshness &amp; coverage</h2></div><div class="card-body">
                            <p class="mb-2">Latest device report: <strong>{{ $freshestReport ? \Carbon\Carbon::parse($freshestReport)->format('M d, Y H:i') : 'N/A' }}</strong></p>
                            <p class="mb-2">Devices with no report: <strong>{{ $devicesWithoutReports }}</strong></p><p class="mb-3">Devices reporting late: <strong>{{ $lateDevices }}</strong></p>
                            <div class="small text-muted">Freshness rule: twice the configured reading interval, with a 60-minute minimum; 24 hours when no interval is recorded.</div>
                        </div></section></div>
                    </div>

                    <section class="card mb-3"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Baseline, actual and benchmark context</h2></div><div class="card-body">
                        <p class="small text-muted">Actual-versus-baseline energy totals are N/A until the energy register is defined as interval energy or cumulative meter energy. No weather or occupancy feed is connected, so weather-normalized performance is also N/A.</p>
                        @if($baselines->isNotEmpty())
                            <div class="table-responsive"><table class="table align-middle"><thead><tr><th>Site</th><th>Approved baseline</th><th>Baseline period</th><th>Method</th><th>Energy intensity comparison</th></tr></thead><tbody>
                            @foreach($baselineComparisons as $comparison)
                                <tr><td>{{ $comparison->site->name ?? 'Site' }}</td><td>{{ $comparison->baseline->baseline_kwh !== null ? number_format($comparison->baseline->baseline_kwh, 2) . ' kWh' : 'N/A' }}</td><td>{{ $comparison->baseline->period_start }} – {{ $comparison->baseline->period_end }}</td><td>{{ $comparison->baseline->methodology }}</td><td>
                                    @if($comparison->baseline_eui !== null && $comparison->benchmark)
                                        {{ number_format($comparison->baseline_eui, 3) }} kWh/sqft baseline vs {{ number_format($comparison->benchmark->benchmark_value, 3) }} benchmark · gap {{ $comparison->benchmark_gap > 0 ? '+' : '' }}{{ number_format($comparison->benchmark_gap, 3) }} kWh/sqft
                                        <div class="small text-muted">{{ $comparison->benchmark->name }} · {{ $comparison->benchmark->version }} · {{ $comparison->benchmark->source_citation }}</div>
                                    @else N/A · No matching approved benchmark and complete area context
                                    @endif
                                </td></tr>
                            @endforeach
                            </tbody></table></div>
                        @else
                            <div class="text-muted">N/A · No approved, non-demo baseline overlaps this reporting period.</div>
                        @endif
                        @if($benchmarks->isNotEmpty())<details class="mt-2"><summary>Approved benchmark sources</summary><ul class="mt-2 mb-0">@foreach($benchmarks as $benchmark)<li>{{ $benchmark->name }} {{ $benchmark->version }} · {{ $benchmark->metric }} ({{ $benchmark->unit }}) · {{ $benchmark->source_citation }}</li>@endforeach</ul></details>@endif
                    </div></section>

                    <section class="card mb-3"><div class="card-header bg-transparent d-flex justify-content-between align-items-center"><h2 class="h6 mb-0">Savings stages and verified value</h2><a href="{{ route('client.value-reports') }}" class="small">Report history</a></div>
                        @if($verifiedSavings->isNotEmpty())<div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Site / measure</th><th>Stage</th><th>Estimated savings</th><th>Verified savings</th><th>Basis / confidence</th><th>Evidence / verification date</th></tr></thead><tbody>@foreach($verifiedSavings as $measure)<tr><td>{{ $sites->firstWhere('id', $measure->site_id)->name ?? 'Site' }}<div class="small">{{ $measure->title }}</div></td><td><span class="badge {{ $measure->stage === 'verified' ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">{{ ucfirst($measure->stage) }}</span></td><td>{{ $measure->estimated_savings_kwh !== null ? number_format($measure->estimated_savings_kwh, 2) . ' kWh (estimate)' : 'N/A' }}</td><td>{{ $measure->stage === 'verified' && $measure->verified_savings_kwh !== null ? number_format($measure->verified_savings_kwh, 2) . ' kWh' : 'N/A · not verified' }}</td><td>{{ $measure->stage === 'verified' && filled($measure->evidence) && $measure->verified_at ? 'Recorded verification evidence' : 'Operator estimate / unverified' }}</td><td>{{ $measure->evidence ?: 'N/A · no evidence recorded' }}<div class="small text-muted">{{ $measure->verified_at ?: 'Verification date not recorded' }}</div></td></tr>@endforeach</tbody></table></div>
                        @else<div class="card-body text-muted">No customer-visible savings measures have been recorded.</div>@endif
                    </section>

                    <section id="actions" class="card mb-3"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Insights to customer actions</h2></div>
                        @if($recommendations->isNotEmpty())<div class="list-group list-group-flush">@foreach($recommendations as $recommendation)
                            @php($relatedAnomaly = $recommendation->device_id && $anomalies->contains(fn ($anomaly) => (int) $anomaly->device_id === (int) $recommendation->device_id))
                            <article class="list-group-item p-3"><div class="d-flex flex-wrap justify-content-between gap-2"><div><strong>{{ $recommendation->title }}</strong><div class="small text-muted">{{ $recommendation->site_name ?: 'Portfolio action' }}{{ $recommendation->device_name ? ' / ' . $recommendation->device_name : '' }} · {{ ucfirst($recommendation->priority) }} priority</div></div><span class="badge bg-light text-dark border">{{ str_replace('_', ' ', ucfirst($recommendation->status)) }}</span></div>
                                <p class="my-2">{{ $recommendation->description }}</p><div class="small text-muted mb-2">Owner: {{ $recommendation->owner_name ?: 'Unassigned' }} · Due: {{ $recommendation->due_date ?: 'No due date' }} · Same-device anomaly in period: {{ $relatedAnomaly ? 'Yes' : 'No' }}</div>
                                @if($recommendation->customer_acknowledged_at)<div class="alert alert-light border py-2 small mb-2">Acknowledged {{ \Carbon\Carbon::parse($recommendation->customer_acknowledged_at)->format('M d, Y H:i') }} · {{ $recommendation->customer_note }}</div>@elseif(!in_array($recommendation->status, ['completed']))<form method="POST" action="{{ route('client.recommendations.acknowledge', $recommendation->id) }}" class="d-flex flex-wrap gap-2">@csrf<input name="customer_note" class="form-control" maxlength="2000" minlength="4" required placeholder="Add a customer note or implementation update"><button class="btn btn-sm btn-outline-primary" type="submit">Acknowledge</button></form>@endif
                            </article>
                        @endforeach</div>@else<div class="card-body text-muted">No active customer actions are recorded for this portfolio.</div>@endif
                    </section>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-6"><section class="card h-100"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Detected reading anomalies</h2></div>@if($anomalies->isNotEmpty())<div class="list-group list-group-flush">@foreach($anomalies as $anomaly)<div class="list-group-item"><strong>{{ $anomaly->device->site->name ?? 'Site' }} / {{ $anomaly->device->name ?? 'Device' }}</strong><div class="small text-muted">{{ $anomaly->reading_time?->format('M d, Y H:i') }} · Status flagged anomaly · power {{ $anomaly->power !== null ? number_format($anomaly->power, 2) . ' kW' : 'N/A' }}</div><a class="small" href="{{ route('client.energy-readings', ['device_id' => $anomaly->device_id]) }}">View reading evidence</a></div>@endforeach</div>@else<div class="card-body text-muted">No readings flagged as anomalies in this period. This means no flagged records were found, not that the site has been certified anomaly-free.</div>@endif</section></div>
                        <div class="col-lg-6"><section class="card h-100"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Open operational incidents</h2></div>@if($incidents->isNotEmpty())<div class="list-group list-group-flush">@foreach($incidents as $incident)<div class="list-group-item"><div class="d-flex justify-content-between gap-2"><strong>{{ $incident->title }}</strong><span class="badge bg-warning-subtle text-warning">{{ ucfirst($incident->severity) }} · {{ ucfirst($incident->status) }}</span></div><p class="small mb-2">{{ $incident->description }}</p><div class="small text-muted">{{ $incident->site_name ?: 'Site' }}{{ $incident->device_name ? ' / ' . $incident->device_name : '' }} · {{ $incident->occurred_at }}</div>
                                @if($incident->customer_acknowledged_at)<div class="small text-muted mt-1">Acknowledged · {{ $incident->customer_note }}</div>@else<form method="POST" action="{{ route('client.incidents.acknowledge', $incident->id) }}" class="d-flex flex-wrap gap-2 mt-2">@csrf<input name="customer_note" class="form-control form-control-sm" maxlength="2000" minlength="4" required placeholder="Add a note for the operations team"><button class="btn btn-sm btn-outline-primary" type="submit">Acknowledge</button></form>@endif</div>@endforeach</div>@else<div class="card-body text-muted">No open incidents are recorded for these sites.</div>@endif</section></div>
                    </div>

                    <section class="card mb-3"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Customer onboarding</h2></div>@if($onboarding->isNotEmpty())<div class="table-responsive"><table class="table mb-0"><thead><tr><th>Stage</th><th>Success criteria</th><th>Target date</th><th>Last updated</th></tr></thead><tbody>@foreach($onboarding as $project)<tr><td>{{ str_replace('_', ' ', ucfirst($project->stage)) }}</td><td>{{ $project->success_criteria ?: 'Not specified' }}</td><td>{{ $project->target_date ?: 'N/A' }}</td><td>{{ $project->updated_at }}</td></tr>@endforeach</tbody></table></div>@else<div class="card-body text-muted">Onboarding status has not been recorded yet. Contact your account manager to agree a POC plan and success criteria.</div>@endif</section>

                    <details class="card"><summary class="card-header">Metric definitions and limitations</summary><div class="card-body small text-muted"><p><strong>Average recorded power:</strong> arithmetic average of non-null power readings received during the selected period; not peak demand or energy use.</p><p><strong>Freshness:</strong> last device report compared with twice its expected interval (minimum 60 minutes); devices without an interval use a 24-hour threshold.</p><p><strong>Baseline:</strong> approved site-period record entered by an operator. Weather adjustment is unavailable without linked weather and occupancy inputs.</p><p class="mb-0"><strong>Benchmark:</strong> approved version and cited source only. Comparisons appear only for a compatible energy-intensity benchmark and known site area. No billing cost or savings target is inferred from telemetry.</p></div></details>
                </div>
            </main>
        </div>
    </div>
</div>

@include('client.include.footer')
