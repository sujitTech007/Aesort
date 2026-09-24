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

                            <!-- Page Header Card -->
                            <div class="row">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                            <div>
                                                <h2 class="fw-bold fs-2 mb-1">🔌 Devices &amp; Sensors</h2>
                                                <p class="mb-0 text-secondary">Monitor power consumption and status of all connected devices</p>
                                            </div>
                                            <a href="{{ route('client.meter') }}" class="btn btn-outline-primary">
                                                <i class="ri-arrow-left-line me-1"></i> Back to Dashboard
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats Row -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Total Devices</h6>
                                                <i class="ri-dashboard-line fs-3 text-dark"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0">12</h3>
                                            <p class="text-muted mb-0 small">Connected</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Active</h6>
                                                <i class="ri-cpu-line fs-3 text-success"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 text-success">8</h3>
                                            <p class="text-success mb-0 small">Currently Running</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Offline</h6>
                                                <i class="ri-wifi-off-line fs-3 text-danger"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 text-danger">4</h3>
                                            <p class="text-danger mb-0 small">Not Running</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Load Capacity</h6>
                                                <i class="ri-database-2-line fs-3 text-warning"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 text-warning">85%</h3>
                                            <p class="text-warning mb-0 small">Near Maximum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Devices Table -->
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-3 fw-bold">Device Power Consumption</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover align-middle w-100">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Device Name</th>
                                                        <th>Status</th>
                                                        <th>Voltage</th>
                                                        <th>Current</th>
                                                        <th>Power Usage</th>
                                                        <th>Capacity</th>
                                                        <th>Energy Used</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><i class="ri-temp-cold-line me-2 text-primary"></i><strong>Air Conditioner</strong></td>
                                                        <td><span class="badge bg-success">Running</span></td>
                                                        <td>230 V</td><td>4.2 A</td><td>1.8 kW</td><td>2.0 kW</td><td>5.4 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'Air Conditioner']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-fridge-line me-2 text-info"></i><strong>Refrigerator</strong></td>
                                                        <td><span class="badge bg-success">Running</span></td>
                                                        <td>220 V</td><td>1.1 A</td><td>0.45 kW</td><td>1.0 kW</td><td>2.1 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'Refrigerator']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-loader-line me-2 text-secondary"></i><strong>Washing Machine</strong></td>
                                                        <td><span class="badge bg-danger">Off</span></td>
                                                        <td>0 V</td><td>0 A</td><td>0 kW</td><td>1.5 kW</td><td>0.0 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'Washing%20Machine']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-lightbulb-line me-2 text-warning"></i><strong>HVAC System</strong></td>
                                                        <td><span class="badge bg-success">Running</span></td>
                                                        <td>230 V</td><td>6.5 A</td><td>2.4 kW</td><td>3.0 kW</td><td>8.2 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'HVAC%20System']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-server-line me-2 text-danger"></i><strong>Server Rack</strong></td>
                                                        <td><span class="badge bg-success">Running</span></td>
                                                        <td>230 V</td><td>8.0 A</td><td>3.2 kW</td><td>4.0 kW</td><td>14.1 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'Server%20Rack']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="ri-lightbulb-flash-line me-2 text-warning"></i><strong>Office Lighting</strong></td>
                                                        <td><span class="badge bg-warning text-dark">Standby</span></td>
                                                        <td>220 V</td><td>0.9 A</td><td>0.2 kW</td><td>0.5 kW</td><td>1.6 kWh</td>
                                                        <td><a href="{{ route('client.dev.detail', ['device' => 'Office%20Lighting']) }}" class="btn btn-sm btn-outline-primary">View</a></td>
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