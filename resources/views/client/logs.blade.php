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
                                                <h2 class="fw-bold fs-2 mb-1">📋 Recent Energy Logs</h2>
                                                <p class="mb-0 text-secondary">Real-time energy readings from all connected meters and sensors</p>
                                            </div>
                                            <a href="{{ route('client.meter') }}" class="btn btn-outline-primary">
                                                <i class="ri-arrow-left-line me-1"></i> Back to Dashboard
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Summary Stats -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Avg Voltage</h6>
                                                <i class="ri-flashlight-line fs-3 text-primary"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0">228 V</h3>
                                            <p class="text-muted mb-0 small">Last 24 hrs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Avg Current</h6>
                                                <i class="ri-pulse-line fs-3 text-success"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0">5.1 A</h3>
                                            <p class="text-success mb-0 small">Stable</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Peak Power</h6>
                                                <i class="ri-line-chart-line fs-3 text-warning"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0">2.1 kW</h3>
                                            <p class="text-warning mb-0 small">Today's Peak</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Total Energy</h6>
                                                <i class="ri-battery-charge-line fs-3 text-danger"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0">48.3 kWh</h3>
                                            <p class="text-danger mb-0 small">Today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Logs Table -->
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-3 fw-bold">Energy Reading Logs</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle w-100">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Voltage</th>
                                                        <th>Current</th>
                                                        <th>Power</th>
                                                        <th>Energy</th>
                                                        <th>Power Factor</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logTable">
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>12:01 PM</td>
                                                        <td>230 V</td><td>5.1 A</td><td>1.4 kW</td><td>12.3 kWh</td><td>0.95</td>
                                                        <td><span class="badge bg-success">Normal</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>11:45 AM</td>
                                                        <td>229 V</td><td>5.3 A</td><td>1.5 kW</td><td>11.8 kWh</td><td>0.94</td>
                                                        <td><span class="badge bg-success">Normal</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>11:30 AM</td>
                                                        <td>231 V</td><td>6.8 A</td><td>2.1 kW</td><td>11.2 kWh</td><td>0.91</td>
                                                        <td><span class="badge bg-warning text-dark">High Load</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>11:15 AM</td>
                                                        <td>228 V</td><td>4.9 A</td><td>1.3 kW</td><td>10.5 kWh</td><td>0.96</td>
                                                        <td><span class="badge bg-success">Normal</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>11:00 AM</td>
                                                        <td>227 V</td><td>5.0 A</td><td>1.4 kW</td><td>9.8 kWh</td><td>0.95</td>
                                                        <td><span class="badge bg-success">Normal</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-time-line me-1 text-muted"></i>10:45 AM</td>
                                                        <td>232 V</td><td>7.2 A</td><td>2.4 kW</td><td>9.1 kWh</td><td>0.88</td>
                                                        <td><span class="badge bg-danger">Alert</span></td>
                                                    </tr>
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