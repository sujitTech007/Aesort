@include('admin.include.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="page-content">


    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Dashboard</h4>
        </div>

        <div class="text-end">
            <ol class="breadcrumb m-0 py-0 fs-13">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Aeshort</a></li>

                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    
    <div class="page-container">
        <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                    Total Devices</h5>
                                <h3 class="mt-2 mb-1 fw-bold">{{ $totalDevices }}</h3>
                            </div>
                            <div class="avatar-sm bg-light rounded">
                                <span class="avatar-title rounded fs-3 text-primary">
                                    <i class="ri-device-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                    Total Client</h5>
                                <h3 class="mt-2 mb-1 fw-bold">{{ $totalClients }}</h3>
                            </div>
                            <div class="avatar-sm bg-light rounded">
                                <span class="avatar-title rounded fs-3 text-primary">
                                    <i class="ri-user-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                    Total Technician</h5>
                                <h3 class="mt-2 mb-1 fw-bold">{{ $totalTechnicians }}</h3>
                            </div>
                            <div class="avatar-sm bg-light rounded">
                                <span class="avatar-title rounded fs-3 text-primary">
                                    <i class="ri-user-line"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                    Total Sites</h5>
                                <h3 class="mt-2 mb-1 fw-bold">{{ $totalSites }}</h3>
                            </div>
                            <div class="avatar-sm bg-light rounded">
                                <span class="avatar-title rounded fs-3 text-primary">
                                    <i class="ri-building-line"></i>
                                </span>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-start gap-2 justify-content-between">
                            <div>
                                <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                    Verified Customer Energy Value</h5>
                                <h3 class="mt-2 mb-1 fw-bold">{{ $totalSites }}</h3>
                            </div>
                            <div class="avatar-sm bg-light rounded">
                                <span class="avatar-title rounded fs-3 text-primary">
                                    <i class="ri-building-line"></i>
                                </span>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- END wrapper -->

@include('admin.include.footer')