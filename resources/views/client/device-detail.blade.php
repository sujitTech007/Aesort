@include('client.include.header')

<div class="page-content">
    <div class="container">

        <!-- Main Row -->
        <div class="row d-flex justify-content-between">
            <div class="col-md-3">
                @include('client/include.sidebar-nav') 
            </div>
           <div class="col-md-9">
                 <div class="page-content-col">
                    <div class="page-content pt-0">
                        <div class="page-container p-0">

                            <!-- Page Header -->
                            <div class="row">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                            <div>
                                                <h2 class="fw-bold fs-2 mb-1" id="deviceTitle">⚡ Device Detail</h2>
                                                <p class="mb-0 text-secondary">Real-time power readings and performance metrics</p>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="status-online">● ONLINE</span>
                                                <a href="{{ route('client.view.devices') }}" class="btn btn-outline-primary">
                                                    <i class="ri-arrow-left-line me-1"></i> Back to Devices
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Metric Cards -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <div class="card metric-card voltage border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Voltage</h6>
                                                <i class="ri-flashlight-line fs-3" style="color:#02bcd4;"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0" id="deviceVoltage">230 <span class="fs-6 text-muted">V</span></h3>
                                            <p class="text-muted mb-0 small">Live Reading</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card metric-card current border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Current</h6>
                                                <i class="ri-pulse-line fs-3 text-success"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0" id="deviceCurrent">4.2 <span class="fs-6 text-muted">A</span></h3>
                                            <p class="text-muted mb-0 small">Live Reading</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card metric-card power border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Power</h6>
                                                <i class="ri-lightbulb-flash-line fs-3 text-warning"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0" id="devicePower">1.8 <span class="fs-6 text-muted">kW</span></h3>
                                            <p class="text-muted mb-0 small">Current Usage</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card metric-card energy border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Energy Today</h6>
                                                <i class="ri-battery-charge-line fs-3" style="color:#9c27b0;"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0" id="deviceEnergy">5.4 <span class="fs-6 text-muted">kWh</span></h3>
                                            <p class="text-muted mb-0 small">Consumed Today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status + Chart Row -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <div class="card h-100 border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <h5 class="fw-bold mb-3">Device Status</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex justify-content-between py-2 border-bottom">
                                                    <span class="text-muted">Status</span>
                                                    <span id="deviceStatus" class="badge bg-success">Running</span>
                                                </li>
                                                <li class="d-flex justify-content-between py-2 border-bottom">
                                                    <span class="text-muted">Capacity</span>
                                                    <span class="fw-bold">2.0 kW</span>
                                                </li>
                                                <li class="d-flex justify-content-between py-2 border-bottom">
                                                    <span class="text-muted">Load %</span>
                                                    <span class="fw-bold text-warning">90%</span>
                                                </li>
                                                <li class="d-flex justify-content-between py-2">
                                                    <span class="text-muted">Power Factor</span>
                                                    <span class="fw-bold">0.95</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card h-100 border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <h5 class="fw-bold mb-3">Power Trend</h5>
                                            <canvas id="deviceChart" height="120"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Readings Table -->
                            <div class="row">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-body">
                                        <h5 class="fw-bold mb-3">Recent Readings</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle w-100" id="deviceLogTable">
                                                <thead class="table-light">
                                                    <tr><th>Time</th><th>Voltage</th><th>Current</th><th>Power</th><th>Status</th></tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td>12:01 PM</td><td>230 V</td><td>4.2 A</td><td>1.8 kW</td><td><span class="badge bg-success">Normal</span></td></tr>
                                                    <tr><td>11:45 AM</td><td>229 V</td><td>4.1 A</td><td>1.7 kW</td><td><span class="badge bg-success">Normal</span></td></tr>
                                                    <tr><td>11:30 AM</td><td>231 V</td><td>4.5 A</td><td>1.9 kW</td><td><span class="badge bg-warning text-dark">High</span></td></tr>
                                                    <tr><td>11:15 AM</td><td>228 V</td><td>4.0 A</td><td>1.6 kW</td><td><span class="badge bg-success">Normal</span></td></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('client.include.footer')
<script>
    const params = new URLSearchParams(window.location.search);
    const device = params.get('device') || 'Device';
    document.getElementById('deviceTitle').innerHTML = '⚡ ' + decodeURIComponent(device);

    // Mini chart
    const ctx = document.getElementById('deviceChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['10:00','10:15','10:30','10:45','11:00','11:15','11:30','11:45','12:00'],
            datasets: [{
                label: 'Power (kW)',
                data: [1.4, 1.6, 1.5, 1.9, 1.7, 1.6, 1.9, 1.7, 1.8],
                borderColor: '#02bcd4',
                backgroundColor: 'rgba(2,188,212,0.08)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: false, grid: { color: 'rgba(0,0,0,0.04)' } }, x: { grid: { display: false } } }
        }
    });
</script>

