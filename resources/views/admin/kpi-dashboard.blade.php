@include('admin.include.header')

@php
    $kpiVersionPeriod = 'All-time snapshot / ' . now()->format('F Y');
@endphp

<style>
    .kpi-dashboard .kpi-card { height: 100%; border: 1px solid var(--bs-border-color); box-shadow: none; }
    .kpi-dashboard .kpi-icon { display: grid; width: 44px; height: 44px; place-items: center; border-radius: 6px; font-size: 22px; }
    .kpi-dashboard .kpi-section { scroll-margin-top: 1rem; }
    .kpi-dashboard .chart-surface { min-height: 290px; }
    .kpi-dashboard .section-links { display: flex; flex-wrap: wrap; gap: .5rem; }
    .kpi-dashboard .section-links a { text-decoration: none; }
    .kpi-dashboard .empty-chart { min-height: 270px; display: grid; place-items: center; color: var(--bs-secondary-color); }
    .kpi-dashboard .kpi-context { font-size: .72rem; line-height: 1.45; }
    .kpi-dashboard .kpi-context span { display: block; }
</style>

<div class="page-content kpi-dashboard">
    <div class="page-title-head d-flex flex-wrap align-items-center gap-3">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-1">AESORT KPI Dashboard</h4>
            <p class="text-muted mb-0">Portfolio overview · {{ $kpiVersionPeriod }}</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.reports') }}" class="btn btn-outline-secondary"><i class="ri-file-chart-line me-1"></i>Reports</a>
            <button type="button" id="download-kpi-report" class="btn btn-primary"><i class="ri-download-2-line me-1"></i>Download report</button>
        </div>
    </div>

    <div class="page-container">
        <nav class="section-links mb-4" aria-label="Dashboard sections">
            <a class="btn btn-sm btn-light" href="#executive"><i class="ri-dashboard-line me-1"></i>Executive</a>
            <a class="btn btn-sm btn-light" href="#customer-energy-value"><i class="ri-flashlight-line me-1"></i>Customer Energy Value</a>
            <a class="btn btn-sm btn-light" href="#portfolio-benchmarking"><i class="ri-bar-chart-grouped-line me-1"></i>Portfolio Benchmarking</a>
            <a class="btn btn-sm btn-light" href="#analytics-data"><i class="ri-line-chart-line me-1"></i>Analytics &amp; Data</a>
            <a class="btn btn-sm btn-light" href="#operations-customer-success"><i class="ri-customer-service-2-line me-1"></i>Operations &amp; Customer Success</a>
            <a class="btn btn-sm btn-light" href="#commercial-financial"><i class="ri-money-dollar-circle-line me-1"></i>Commercial &amp; Financial</a>
        </nav>

        <section id="executive" class="kpi-section mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold mb-0">Executive</h5>
                <span class="text-muted small">Registered portfolio totals</span>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-4 g-3">
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Customers</p><h3 class="fw-bold mb-0">{{ number_format($totalClients) }}</h3><a class="small" href="{{ route('admin.clients.index') }}">Manage customers</a></div>
                    <span class="kpi-icon bg-primary-subtle text-primary"><i class="ri-user-3-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $usersUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Sites</p><h3 class="fw-bold mb-0">{{ number_format($totalSites) }}</h3><a class="small" href="{{ route('admin.sites.index') }}">Manage sites</a></div>
                    <span class="kpi-icon bg-success-subtle text-success"><i class="ri-building-2-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $sitesUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Devices</p><h3 class="fw-bold mb-0">{{ number_format($totalDevices) }}</h3><a class="small" href="{{ route('admin.devices.index') }}">Manage devices</a></div>
                    <span class="kpi-icon bg-info-subtle text-info"><i class="ri-cpu-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $devicesUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Technicians</p><h3 class="fw-bold mb-0">{{ number_format($totalTechnicians) }}</h3><a class="small" href="{{ route('admin.technicians.index') }}">Manage technicians</a></div>
                    <span class="kpi-icon bg-warning-subtle text-warning"><i class="ri-tools-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $usersUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
            </div>
        </section>

        <section id="customer-energy-value" class="kpi-section mb-4">
            <div class="card"><div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-start gap-3">
                    <span class="kpi-icon bg-warning-subtle text-warning"><i class="ri-flashlight-line"></i></span>
                    <div><h5 class="fw-bold mb-1">Customer Energy Value</h5><p class="text-muted mb-0">Energy usage, savings, and verified value are not recorded in the current data model, so no estimate is shown.</p></div>
                </div>
                <a href="{{ route('admin.sites.index') }}" class="btn btn-outline-primary"><i class="ri-building-line me-1"></i>View sites</a>
            </div></div>
        </section>

        <section id="portfolio-benchmarking" class="kpi-section mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold mb-0">Portfolio Benchmarking</h5>
                <a href="{{ route('admin.sites.index') }}" class="btn btn-sm btn-outline-secondary"><i class="ri-list-check-2 me-1"></i>Site records</a>
            </div>
            <div class="row g-3">
                <div class="col-xl-4">
                    <div class="card h-100"><div class="card-body">
                        <h6 class="fw-bold">Portfolio snapshot</h6>
                        <div class="d-flex justify-content-between border-bottom py-2"><span class="text-muted">Active sites</span><strong>{{ number_format($activeSites) }}</strong></div>
                        <div class="d-flex justify-content-between border-bottom py-2"><span class="text-muted">All sites</span><strong>{{ number_format($totalSites) }}</strong></div>
                        <div class="d-flex justify-content-between py-2"><span class="text-muted">Devices across portfolio</span><strong>{{ number_format($totalDevices) }}</strong></div>
                        <p class="text-muted small mb-0 mt-2">Site energy benchmarks are unavailable until energy readings are collected.</p>
                    </div></div>
                </div>
                <div class="col-xl-8">
                    <div class="card h-100"><div class="card-body">
                        <h6 class="fw-bold mb-0">Sites by type</h6>
                        <div id="site-type-chart" class="chart-surface" role="img" aria-label="Donut chart showing sites by type"></div>
                    </div></div>
                </div>
            </div>
        </section>

        <section id="analytics-data" class="kpi-section mb-4">
            <h5 class="fw-bold mb-3">Analytics &amp; Data</h5>
            <div class="row g-3">
                <div class="col-xl-8">
                    <div class="card h-100"><div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <h6 class="fw-bold mb-0">New records by month</h6>
                            <span class="text-muted small">Last six months</span>
                        </div>
                        <div id="record-trend-chart" class="chart-surface" role="img" aria-label="Area chart showing monthly customer, site, and device registrations"></div>
                    </div></div>
                </div>
                <div class="col-xl-4">
                    <div class="card h-100"><div class="card-body">
                        <h6 class="fw-bold mb-0">Devices by status</h6>
                        <div id="device-status-chart" class="chart-surface" role="img" aria-label="Donut chart showing registered devices by status"></div>
                    </div></div>
                </div>
            </div>
        </section>

        <section id="operations-customer-success" class="kpi-section mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold mb-0">Operations &amp; Customer Success</h5>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col"><div class="card kpi-card"><div class="card-body">
                    <p class="text-muted small text-uppercase fw-bold mb-2">Active customers</p><h3 class="fw-bold mb-0">{{ number_format($activeClients) }} <span class="text-muted fs-6">/ {{ number_format($totalClients) }}</span></h3>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $usersUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body">
                    <p class="text-muted small text-uppercase fw-bold mb-2">Active sites</p><h3 class="fw-bold mb-0">{{ number_format($activeSites) }} <span class="text-muted fs-6">/ {{ number_format($totalSites) }}</span></h3>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $sitesUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body">
                    <p class="text-muted small text-uppercase fw-bold mb-2">Technician coverage</p><h3 class="fw-bold mb-0">{{ number_format($totalTechnicians) }}</h3><a class="small" href="{{ route('admin.technicians.index') }}">View technicians</a>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $plansUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
            </div>
        </section>

        <section id="commercial-financial" class="kpi-section mb-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="fw-bold mb-0">Commercial &amp; Financial</h5>
                <a href="{{ route('admin.billing') }}" class="btn btn-sm btn-outline-secondary"><i class="ri-bank-card-line me-1"></i>Billing</a>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Subscription plans</p><h3 class="fw-bold mb-0">{{ number_format($totalSubscriptionPlans) }}</h3><a class="small" href="{{ route('admin.subscription_plans.index') }}">Manage plans</a></div>
                    <span class="kpi-icon bg-primary-subtle text-primary"><i class="ri-price-tag-3-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $subscriptionsUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Subscriptions</p><h3 class="fw-bold mb-0">{{ number_format($totalSubscriptions) }}</h3><a class="small" href="{{ route('admin.subscription.index') }}">View subscriptions</a></div>
                    <span class="kpi-icon bg-success-subtle text-success"><i class="ri-file-list-3-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $subscriptionsUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
                <div class="col"><div class="card kpi-card"><div class="card-body d-flex align-items-start justify-content-between gap-3">
                    <div><p class="text-muted small text-uppercase fw-bold mb-2">Recorded subscription amount</p><h3 class="fw-bold mb-0">{{ number_format($subscriptionValue, 2) }}</h3><span class="text-muted small">Amount field total; not verified revenue</span></div>
                    <span class="kpi-icon bg-info-subtle text-info"><i class="ri-money-dollar-circle-line"></i></span>
                </div><div class="card-footer bg-transparent kpi-context"><span><strong>Data updated:</strong> {{ $subscriptionsUpdatedAt?->format('M d, Y, h:i A') ?? 'Timestamp unavailable' }}</span><span><strong>Version/period:</strong> {{ $kpiVersionPeriod }}</span></div></div></div>
            </div>
        </section>

        <section class="kpi-section mb-4" aria-labelledby="report-summary-title">
            <div class="card"><div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                    <h5 id="report-summary-title" class="fw-bold mb-0"><i class="ri-file-chart-line me-1"></i>Report summary</h5>
                    <a href="{{ route('admin.reports') }}" class="small">Open reports &amp; insights</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0" id="kpi-report-table">
                        <thead><tr><th scope="col">Metric</th><th scope="col" class="text-end">Count / value</th><th scope="col">Category</th></tr></thead>
                        <tbody>
                            <tr><td>Customers</td><td class="text-end">{{ $totalClients }}</td><td>Operations</td></tr>
                            <tr><td>Technicians</td><td class="text-end">{{ $totalTechnicians }}</td><td>Operations</td></tr>
                            <tr><td>Sites</td><td class="text-end">{{ $totalSites }}</td><td>Portfolio</td></tr>
                            <tr><td>Devices</td><td class="text-end">{{ $totalDevices }}</td><td>Analytics</td></tr>
                            <tr><td>Subscription plans</td><td class="text-end">{{ $totalSubscriptionPlans }}</td><td>Commercial</td></tr>
                            <tr><td>Subscriptions</td><td class="text-end">{{ $totalSubscriptions }}</td><td>Commercial</td></tr>
                            <tr><td>Recorded subscription amount</td><td class="text-end">{{ number_format($subscriptionValue, 2) }}</td><td>Commercial</td></tr>
                        </tbody>
                    </table>
                </div>
            </div></div>
        </section>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const renderDonut = (elementId, labels, values, colors) => {
        const element = document.getElementById(elementId);
        const total = values.reduce((sum, value) => sum + Number(value), 0);
        if (!total) {
            element.innerHTML = '<div class="empty-chart">No records available yet</div>';
            return;
        }

        new ApexCharts(element, {
            chart: { type: 'donut', height: 290, toolbar: { show: false } },
            series: values,
            labels: labels,
            colors: colors,
            legend: { position: 'bottom' },
            dataLabels: { enabled: true },
            plotOptions: { pie: { donut: { size: '62%', labels: { show: true, total: { show: true, label: 'Total' } } } } },
            noData: { text: 'No records available yet' },
            responsive: [{ breakpoint: 576, options: { chart: { height: 260 }, legend: { position: 'bottom' } } }]
        }).render();
    };

    renderDonut(
        'site-type-chart',
        @json($siteTypes->pluck('label')->values()),
        @json($siteTypes->pluck('total')->map(fn ($total) => (int) $total)->values()),
        ['#248a74', '#df9b36', '#4386a8', '#ca6253', '#70934b', '#8c76a8']
    );

    renderDonut(
        'device-status-chart',
        @json($deviceStatuses->pluck('label')->values()),
        @json($deviceStatuses->pluck('total')->map(fn ($total) => (int) $total)->values()),
        ['#248a74', '#df9b36', '#4386a8', '#ca6253', '#8c76a8']
    );

    new ApexCharts(document.getElementById('record-trend-chart'), {
        chart: { type: 'area', height: 290, toolbar: { show: false }, zoom: { enabled: false } },
        series: @json($trendSeries),
        colors: ['#248a74', '#df9b36', '#4386a8'],
        dataLabels: { enabled: false },
        stroke: { curve: 'smooth', width: 2 },
        fill: { type: 'solid', opacity: 0.12 },
        xaxis: { categories: @json($trendLabels), labels: { rotate: -25 } },
        yaxis: { min: 0, forceNiceScale: true, labels: { formatter: value => Math.round(value) } },
        legend: { position: 'top', horizontalAlign: 'right' },
        tooltip: { y: { formatter: value => `${Math.round(value)} records` } },
        responsive: [{ breakpoint: 576, options: { chart: { height: 260 }, legend: { position: 'bottom', horizontalAlign: 'left' } } }]
    }).render();

    document.getElementById('download-kpi-report').addEventListener('click', function () {
        const rows = [
            ['Metric', 'Count / value', 'Category'],
            ...Array.from(document.querySelectorAll('#kpi-report-table tbody tr'), row =>
                Array.from(row.cells, cell => cell.textContent.trim())
            )
        ];
        const csv = rows.map(row => row.map(value => `"${value.replaceAll('"', '""')}"`).join(',')).join('\r\n');
        const link = document.createElement('a');
        link.href = URL.createObjectURL(new Blob([csv], { type: 'text/csv;charset=utf-8' }));
        link.download = 'aesort-kpi-report.csv';
        link.click();
        URL.revokeObjectURL(link.href);
    });
});
</script>

@endpush

@include('admin.include.footer')