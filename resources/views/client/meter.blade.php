@include('client.include.header')

    
 <div id="alertToastContainer" class="toast-container position-fixed top-0 end-0 p-3"></div>

    <div class="flash-wrapper" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>
  
<div class="page-content">
    <div class="container">

        <!-- Main Row -->
        <div class="row d-flex justify-content-between">
            <div class="col-md-3">
                @include('client/include.sidebar-nav') 
            </div>
           <div class="col-md-9">
                 <div class="page-content-col">

                <!-- Dashboard Header -->
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="dashboard-header d-flex justify-content-between align-items-start flex-wrap gap-3">

                            <div>
                                <h2 class="fw-bold fs-2 mb-1">
                                    ⚡ Real-Time Energy Monitoring
                                </h2>

                                <p class="mb-0 text-secondary">
                                    Monitor your electricity usage and device performance
                                </p>
                            </div>

                            <div class="text-end">
                                <div class="status-online">
                                    ● Device Status: ONLINE
                                </div>

                                <small class="text-secondary" id="liveTime"></small>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- Energy Cards -->
                <div class="row g-3 mb-3">

                    <!-- Voltage -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card" style="background: linear-gradient(135deg, #e0f7fa, #ffffff); border-left: 4px solid #00bcd4;">

                            <div class="card-body p-2">

                                <div class="energy-card position-relative">

                                    <div class="card-title">
                                        Voltage
                                    </div>

                                    <div class="card-value">
                                        <span id="voltage">230</span>
                                        <span class="unit">V</span>
                                    </div>

                                    <div class="riIcon">
                                        <i class="ri-flashlight-line"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Temperature -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card"
                             style="background: linear-gradient(135deg, #e8f5e9, #ffffff); border-left: 4px solid #4caf50;">

                            <div class="card-body p-2">

                                <div class="energy-card position-relative">

                                    <div class="card-title">
                                        Temperature
                                    </div>

                                    <div class="card-value">
                                        <span id="temperature">5.2</span>
                                        <span class="unit">°C</span>
                                    </div>

                                    <div class="riIcon" style="color: #4caf50;">
                                        <i class="ri-temp-hot-fill"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Power -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card"
                             style="background: linear-gradient(135deg, #fff3e0, #ffffff); border-left: 4px solid #ff9800;">

                            <div class="card-body p-2">

                                <div class="energy-card position-relative">

                                    <div class="card-title">
                                        Power
                                    </div>

                                    <div class="card-value">
                                        <span id="power">1.5</span>
                                        <span class="unit">kW</span>
                                    </div>

                                    <div class="riIcon" style="color: #ff9800;">
                                        <i class="ri-lightbulb-flash-line"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Energy Consumption -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card"
                             style="background: linear-gradient(135deg, #f3e5f5, #ffffff); border-left: 4px solid #9c27b0;">

                            <div class="card-body p-2">

                                <div class="energy-card position-relative">

                                    <div class="card-title">
                                        Energy Consumption
                                    </div>

                                    <div class="card-value">
                                        <span id="energy">12.5</span>
                                        <span class="unit">kWh</span>
                                    </div>

                                    <div class="riIcon" style="color: #9c27b0;">
                                        <i class="ri-line-chart-line"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <!-- Device Statistics -->
                <div class="row g-3 mb-3">

                    <div class="col-xl-3 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-2">

                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="text-secondary mb-0 fs-5">
                                        Total Devices
                                    </h6>
                                    <i class="ri-dashboard-line fs-1 text-dark"></i>
                                </div>

                                <h2 class="fw-bold fs-1 mb-1">12</h2>

                                <p class="text-muted mb-0 small">
                                    Connected Devices
                                </p>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-2">

                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="text-secondary mb-0 fs-5">
                                        Active Devices
                                    </h6>
                                    <i class="ri-cpu-line fs-1 text-success"></i>
                                </div>

                                <h2 class="fw-bold fs-1 mb-1">8</h2>

                                <p class="text-success mb-0 small">
                                    Currently Running
                                </p>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-2">

                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="text-secondary mb-0 fs-5">
                                        Load Capacity
                                    </h6>
                                    <i class="ri-database-2-line fs-1 text-danger"></i>
                                </div>

                                <h2 class="fw-bold fs-1 mb-1">85%</h2>

                                <p class="text-danger mb-0 small">
                                    Near Maximum Limit
                                </p>

                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-body p-2">

                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="text-secondary mb-0 fs-5">
                                        Estimated Bill
                                    </h6>
                                    <i class="ri-money-dollar-circle-line fs-1 text-primary"></i>
                                </div>

                                <h2 class="fw-bold fs-1 mb-1">
                                    $1,240
                                </h2>

                                <p class="text-primary mb-0 small">
                                    Current Month
                                </p>

                            </div>
                        </div>
                    </div>

                </div>


                <!-- Live Power Usage -->
                <div class="row mb-3">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h3 class="mb-0">
                                        ⚡ Live Power Usage
                                    </h3>
                                </div>

                                <canvas id="powerChart" height="100"></canvas>

                            </div>
                        </div>

                    </div>
                </div>


                <!-- Latest Readings & Devices Overview -->
                <div class="row g-3 mb-3">

                    <!-- Latest Readings -->
                    <div class="col-md-7">
                        <div class="card">
                             <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Latest Readings</h5>
                                <a href="{{ route('client.view.logs') }}" class="btn btn-outline-primary btn-sm">View Logs</a>                                
                            </div>
                            <div class="card-body">                               

                                <div class="row g-3">

                                    <div class="col-6 col-lg-3">
                                        <div class="small text-muted">
                                            Voltage
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <span id="latestVoltage">230</span> V
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-3">
                                        <div class="small text-muted">
                                            Current
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <span id="current">5.2</span> A
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-3">
                                        <div class="small text-muted">
                                            Power
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <span id="latestPower">1.5</span> kW
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-3">
                                        <div class="small text-muted">
                                            Energy
                                        </div>
                                        <div class="fw-bold fs-5">
                                            <span id="latestEnergy">12.5</span> kWh
                                        </div>
                                    </div>

                                </div>

                                

                            </div>
                        </div>
                    </div>


                    <!-- Devices Overview -->
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Devices Overview</h5>
                                <a href="{{ route('client.view.devices') }}" class="btn btn-outline-primary btn-sm">View Devices</a>                                
                            </div>
                            <div class="card-body">

                                <div class="row g-3">

                                    <div class="col-4">
                                        <div class="small text-muted">
                                            Total Devices
                                        </div>
                                        <div class="fw-bold fs-3">
                                            12
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="small text-muted">
                                            Active
                                        </div>
                                        <div class="fw-bold fs-3 text-success">
                                            8
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="small text-muted">
                                            Load Capacity
                                        </div>
                                        <div class="fw-bold fs-3">
                                            85%
                                        </div>
                                    </div>

                                </div>

                                

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                     <!-- Spaces Overview -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4">
                             <div class="card-header d-flex justify-content-between align-items-center">
                               <div>
                                 <h4 class="card-title mb-0">Spaces Overview</h4>
                                <small class="text-muted">
                                            Summary of monitored building spaces.
                                            Click to view area reports.
                                        </small>
                               </div>

                                <a href="{{ route('client.view.spaces') }}"
                                       class="btn btn-outline-primary btn-sm">
                                        View Spaces
                                    </a>
                            </div>


                        <div>
                                        <h5 class="mb-0">
                                            
                                        </h5>

                                        
                                    </div>

                                    



                            <div class="card-body pt-0">  
                                                            


                                <div class="row g-3 border-top mt-0 pt-2">

                                    <div class="col-md-4 mt-0">
                                        <div class="small text-muted">
                                            Spaces Monitored
                                        </div>

                                        <div class="fw-bold fs-2">
                                            5
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-0">
                                        <div class="small text-muted">
                                            Critical Areas
                                        </div>

                                        <div class="fw-bold fs-2 text-warning">
                                            1
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-0">
                                        <div class="small text-muted">
                                            Healthy Areas
                                        </div>

                                        <div class="fw-bold fs-2 text-success">
                                            3
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- Additional Panels -->
                <div class="row g-3 mb-4">

                <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header bg-primary_themes text-white fw-bold p-2">
                                Demo Building Scenario
                            </div>

                            <div class="card-body p-0">
                                <table class="table small-card-table mb-0 scenarioBodyTable">
                                    <tbody id="scenarioBody"></tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Live Alerts -->
                    <div class="col-lg-4">
                        <div class="card">

                            <div class="card-header bg-primary_themes text-white fw-bold p-2">
                                Live Alerts
                            </div>

                            <div class="card-body">

                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="text-muted small">
                                        Top-right notifications will appear here.
                                    </div>

                                    <span id="alertCountBadge" class="badge bg-danger">
                                        0 active
                                    </span>
                                </div>

                                <div class="text-muted small">
                                    Critical warnings and operational items are shown as
                                    toast messages for a clean, professional experience.
                                </div>

                            </div>
                        </div>

                        <!-- Anomaly Scenarios -->
                        
                    </div>

                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-header bg-primary_themes text-white fw-bold p-2">
                                Anomaly Scenarios
                            </div>

                            <div class="card-body">

                            <div class="list-group list-group-flush">

                                <div class="list-group-item d-flex justify-content-between align-items-center p-0 py-1">
                                    <p class="fs-15 m-0">After-hours lighting</p>
                                    <span class="badge bg-warning">Warning</span>
                                </div>

                                <div class="list-group-item d-flex justify-content-between align-items-center p-0 py-1">
                                    <p class="fs-15 m-0">HVAC at low occupancy</p>
                                    <span class="badge bg-info">Info</span>
                                </div>

                                <div class="list-group-item d-flex justify-content-between align-items-center p-0 py-1">
                                    <p class="fs-15 m-0">Cafeteria equipment left on</p>
                                    <span class="badge bg-warning">Warning</span>
                                </div>

                                <div class="list-group-item d-flex justify-content-between align-items-center p-0 py-1">
                                    <p class="fs-15 m-0">Engine room abnormal</p>
                                    <span class="badge bg-danger">Critical</span>
                                </div>

                                <div class="list-group-item d-flex justify-content-between align-items-center p-0 py-1">
                                    <p class="fs-15 m-0">Server overheating</p>
                                    <span class="badge bg-danger">Critical</span>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>


                    <!-- Building Scenario -->
                    


                    <!-- Facility Metrics -->
                    <div class="col-lg-4">
                        <div class="card">

                            <div class="card-header bg-primary_themes text-white fw-bold p-2">
                                Facility Metrics
                            </div>

                            <div class="card-body">

                                <ul class="list-unstyled mb-0 small-card-list">

                                    <li class="mb-2">
                                        <strong>Current total demand:</strong>
                                        <span id="facilityDemand">—</span>
                                    </li>

                                    <li class="mb-2">
                                        <strong>Energy consumed today:</strong>
                                        <span id="energyToday">—</span>
                                    </li>

                                    <li class="mb-2">
                                        <strong>Estimated cost today:</strong>
                                        <span id="estCost">—</span>
                                    </li>

                                    <li class="mb-2">
                                        <strong>Peak demand:</strong>
                                        <span id="peakDemand">—</span>
                                    </li>

                                    <li>
                                        <strong>Active alerts:</strong>
                                        <span id="activeAlerts">0</span>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>


                   

                </div>

            </div>
        </div>

    </div>
        <!-- End Main Row -->

</div>

    <!-- Additional Panels: Alert Centre, Scenarios, Facility Metrics -->
    <!-- <div class="container my-4">
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Live Alerts</div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="text-muted small">Top-right notifications will appear here.</div>
                            <span id="alertCountBadge" class="badge bg-danger">0 active</span>
                        </div>
                        <div class="text-muted small">Critical warnings and operational items are shown as toast messages for a clean, professional experience.</div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Anomaly Scenarios</div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">After-hours lighting <span class="badge bg-warning">Warning</span></div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">HVAC at low occupancy <span class="badge bg-info">Info</span></div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">Cafeteria equipment left on <span class="badge bg-warning">Warning</span></div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">Engine room abnormal <span class="badge bg-danger">Critical</span></div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">Server overheating <span class="badge bg-danger">Critical</span></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Demo Building Scenario</div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <tbody id="scenarioBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Facility Metrics</div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li><strong>Current total demand:</strong> <span id="facilityDemand">—</span></li>
                            <li><strong>Energy consumed today:</strong> <span id="energyToday">—</span></li>
                            <li><strong>Estimated cost today:</strong> <span id="estCost">—</span></li>
                            <li><strong>Peak demand:</strong> <span id="peakDemand">—</span></li>
                            <li><strong>Active alerts:</strong> <span id="activeAlerts">0</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card border-0 shadow-sm rounded-4 p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="mb-0">Spaces Overview</h5>
                            <small class="text-muted">Summary of monitored building spaces. Click to view area reports.</small>
                        </div>
                        <a href="{{ route('client.view.spaces') }}" class="btn btn-outline-primary btn-sm">View Spaces</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="d-flex gap-4">
                                <div>
                                    <div class="small text-muted">Spaces Monitored</div>
                                    <div class="fw-bold fs-3">6</div>
                                </div>
                                <div>
                                    <div class="small text-muted">Critical Areas</div>
                                    <div class="fw-bold fs-3 text-warning">1</div>
                                </div>
                                <div>
                                    <div class="small text-muted">Healthy Areas</div>
                                    <div class="fw-bold fs-3 text-success">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    

@include('client.include.footer')

 
<script>
const cookieBox = document.querySelector(".wrapper"),
      buttons = document.querySelectorAll(".button");

// Function to check and show cookie consent
const executeCodes = () => {
  // If cookie already exists, don't show the popup
  if (document.cookie.includes("cookieBy")) return;

  cookieBox.classList.add("show"); 

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      cookieBox.classList.remove("show");

      // Set a cookie for 30 days for both accept and decline
      document.cookie = "cookieBy=seen; max-age=" + 60 * 60 * 24 * 30;
    });
  });
};

// Run on page load
window.addEventListener("load", executeCodes);
</script>
