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
                                                <h2 class="fw-bold fs-2 mb-1">🏢 Building Spaces</h2>
                                                <p class="mb-0 text-secondary">Monitor energy usage and health status across all building areas</p>
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
                                                <h6 class="text-secondary mb-0">Total Spaces</h6>
                                                <i class="ri-building-line fs-3 text-primary"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 fs-2">6</h3>
                                            <p class="text-muted mb-0 small">Monitored Areas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Healthy</h6>
                                                <i class="ri-checkbox-circle-line fs-3 text-success"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 fs-2 text-success">3</h3>
                                            <p class="text-success mb-0 small">Normal Operation</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Critical</h6>
                                                <i class="ri-alert-line fs-3 text-warning"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 fs-2 text-warning">1</h3>
                                            <p class="text-warning mb-0 small">Needs Attention</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="text-secondary mb-0">Total Demand</h6>
                                                <i class="ri-flashlight-line fs-3 text-danger"></i>
                                            </div>
                                            <h3 class="fw-bold mb-0 fs-2">240 kW</h3>
                                            <p class="text-danger mb-0 small">Combined Load</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Spaces Grid -->
                            <div class="row g-3 mb-5" id="spacesList">
                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('client.space.detail', ['space' => 'main_building']) }}" class="card border-0 shadow-sm rounded-4 p-3 px-2 text-decoration-none text-body" role="button">
                                        <div class="d-flex align-items-start justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="space-icon bg-primary bg-opacity-10 text-primary"><i class="fa-solid fa-building"></i></div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold fs-4">Main Building</h6>                                                    
                                                </div>
                                            </div>
                                            <span class="badge bg-success align-self-start">Healthy</span>
                                        </div>
                                        <div class="d-block">
                                            <small class="text-muted">Main incoming meter, power distribution and overall facility load.</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <div><div class="fs-5 fw-bold">120 kW</div><small class="text-muted">Avg demand</small></div>
                                            <small class="text-primary">View Details →</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('client.space.detail', ['space' => 'workspace']) }}" class="card border-0 shadow-sm rounded-4 p-3 px-2 text-decoration-none text-body" role="button">
                                        <div class="d-flex align-items-start justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="space-icon bg-info bg-opacity-10 text-info"><i class="fa-solid fa-chair"></i></div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold fs-4">Workspace</h6>
                                                    
                                                </div>
                                            </div>
                                            <span class="badge bg-info align-self-start">Monitored</span>
                                        </div>
                                        <div class="d-block"><small class="text-muted">Office lighting, plug loads and occupancy analytics.</small></div>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <div><div class="fs-5 fw-bold">34 kW</div><small class="text-muted">Peak load</small></div>
                                            <small class="text-primary">View Details →</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('client.space.detail', ['space' => 'server_room']) }}" class="card border-0 shadow-sm rounded-4 p-3 px-2 text-decoration-none text-body" role="button">
                                        <div class="d-flex align-items-start justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="space-icon bg-warning bg-opacity-10 text-warning"><i class="fa-solid fa-server"></i></div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold fs-4">Server Room</h6>
                                                    
                                                </div>
                                            </div>
                                            <span class="badge bg-warning text-dark align-self-start">Critical</span>
                                        </div>
                                        <div class="d-block">
                                            <small class="text-muted">Critical infrastructure, cooling systems and redundancy load.</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <div><div class="fs-5 fw-bold">46 kW</div><small class="text-muted">Current draw</small></div>
                                            <small class="text-primary">View Details →</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('client.space.detail', ['space' => 'cafeteria']) }}" class="card border-0 shadow-sm rounded-4 p-3 px-2 text-decoration-none text-body" role="button">
                                        <div class="d-flex align-items-start justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="space-icon bg-danger bg-opacity-10 text-danger"><i class="fa-solid fa-mug-hot"></i></div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold fs-4">Cafeteria</h6>                                                    
                                                </div>
                                            </div>
                                            <span class="badge bg-danger align-self-start">Attention</span>
                                        </div>
                                        <div class="d-block"><small class="text-muted">Kitchen appliances and after-hours energy usage.</small></div>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <div><div class="fs-5 fw-bold">28 kW</div><small class="text-muted">Peak draw</small></div>
                                            <small class="text-primary">View Details →</small>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <a href="{{ route('client.space.detail', ['space' => 'meeting_room']) }}" class="card border-0 shadow-sm rounded-4 p-3 px-2 text-decoration-none text-body" role="button">
                                        <div class="d-flex align-items-start justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="space-icon bg-secondary bg-opacity-10 text-secondary"><i class="fa-solid fa-handshake-angle"></i></div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold fs-4">Meeting Room</h6>                                                
                                                </div>
                                            </div>
                                            <span class="badge bg-secondary align-self-start">Stable</span>
                                        </div>
                                        <div class="d-block">
                                            <small class="text-muted">AV systems, HVAC and occupancy scheduling.</small>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end mt-2">
                                            <div><div class="fs-5 fw-bold">12 kW</div><small class="text-muted">Avg usage</small></div>
                                            <small class="text-primary">View Details →</small>
                                        </div>
                                    </a>
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