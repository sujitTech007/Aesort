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
                        <div class="page-container p-0" id="spaceDetailPage">

                            <!-- Page Header -->
                            <div class="row">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                            <div>
                                                <h2 class="fw-bold fs-2 mb-1" id="detailTitle">🏢 Space Detail Report</h2>
                                                <p class="mb-0 text-secondary" id="detailSummary">Loading area metrics and device power details.</p>
                                                <div class="mt-2">
                                                    <span id="detailStatusBadge" class="badge bg-primary text-uppercase me-2">Status</span>
                                                    <small class="text-muted" id="detailUpdatedAt">Updated just now</small>
                                                </div>
                                            </div>
                                            <a href="{{ route('client.view.spaces') }}" class="btn btn-outline-primary">
                                                <i class="ri-arrow-left-line me-1"></i> Back to Spaces
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Metrics -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="small text-muted">Peak Power</div>
                                            <div class="fs-4 fw-bold" id="detailPeakPower">— kW</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="small text-muted">Devices</div>
                                            <div class="fs-4 fw-bold" id="detailDeviceCount">—</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="small text-muted">Voltage</div>
                                            <div class="fs-4 fw-bold" id="detailVoltage">— V</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-0 shadow-sm rounded-4">
                                        <div class="card-body p-3">
                                            <div class="small text-muted">Priority</div>
                                            <div class="fs-4 fw-bold" id="detailPriority">—</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Health + Performance -->
                            <div class="row g-3 mb-3">
                                <div class="col-lg-7">
                                    <div class="card rounded-4 shadow-sm border-0 bg-white h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <div>
                                                    <h5 class="mb-1 fw-bold">Area Health Snapshot</h5>
                                                    <p class="text-muted mb-0" id="detailFocus">Evaluating device and energy status for the selected area.</p>
                                                </div>
                                                <span class="badge bg-soft-secondary text-uppercase text-dark" id="detailHealthStatus">Stable</span>
                                            </div>
                                            <h6 class="mt-3">Area Overview</h6>
                                            <p class="text-secondary" id="detailDesc">Space overview and energy objective details will be shown here.</p>
                                            <h6>Operational Focus</h6>
                                            <ul class="list-unstyled text-muted" id="detailOverview"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card rounded-4 shadow-sm border-0 h-100">
                                        <div class="card-body">
                                            <h5 class="mb-3 fw-bold">Quick Performance</h5>
                                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                                <span class="text-muted">Current voltage</span>
                                                <span class="fw-bold" id="detailVoltage2">— V</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                                <span class="text-muted">Current draw</span>
                                                <span class="fw-bold" id="detailCurrent">— A</span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-muted">Power</span>
                                                <span class="fw-bold" id="detailPower">— kW</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Devices Table + Chart -->
                            <div class="row g-3 mb-3">
                                <div class="col-lg-7">
                                    <div class="card rounded-4 shadow-sm border-0">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold mb-1">Device Power &amp; Status</h5>
                                            <p class="text-muted small mb-3">All devices present in this area with current draw and operational status.</p>
                                            <div class="table-responsive">
                                                <table class="table table-borderless device-table mb-0">
                                                    <thead class="bg-light">
                                                        <tr><th>Device</th><th>Current Power</th><th>Status</th></tr>
                                                    </thead>
                                                    <tbody id="detailDeviceTableBody"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="card rounded-4 shadow-sm border-0 h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-bold mb-1">Power Trend</h5>
                                            <p class="text-muted small mb-3">Device-level consumption for the selected area.</p>
                                            <div class="flex-grow-1">
                                                <canvas id="spaceDetailChart" height="220"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recommendations -->
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="card rounded-4 shadow-sm border-0">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold mb-1">Recommended Actions</h5>
                                            <p class="text-muted small mb-3">Suggested next steps to improve energy performance for this area.</p>
                                            <div id="detailRec" class="text-muted"></div>
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