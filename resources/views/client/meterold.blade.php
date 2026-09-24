@include('client.include.header')



<style>
     .status-online {
            color: #22c55e;
            font-weight: 600;
        }

        .energy-card {
            border-radius: 15px;
            padding: 5px;
            transition: 0.3s;
            height: 100%;
        }

        .energy-card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 16px;
            color: #94a3b8;
        }

        .card-value {
            font-size: 34px;
            font-weight: bold;
            margin-top: 10px;
        }

        .unit {
            font-size: 18px;
            color: #38bdf8;
        }

        .chart-card {

            border-radius: 15px;
            padding: 20px;
        }

        .device-info {

            border-radius: 15px;
            padding: 20px;
        }

        .table-dark-custom {

            border-radius: 15px;
            overflow: hidden;
        }

        table {
            margin-bottom: 0 !important;
        }

        .table-dark th,
        .table-dark td {
            background: transparent !important;
        }
.riIcon{
            position: absolute;
    right: 10px;
    font-size: 40px;
    top: 50%;
    transform: translateY(-50%);
    color: #02bcd4;
    opacity: 0.6;
}
</style>

<div class="page-content pt-0">
    <div class="page-container p-0">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="dashboard-header d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <h2 class="fw-bold fs-2 mb-1">⚡ Real-Time Energy Monitoring</h2>
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
        </div>

        <!-- Cards -->
        <div class="row g-x-4">

            <div class="card p-0 bg-transparent shadow-none m-0">
                <div class="card-body p-0 bg-transparent">
                    <div class="row">
                        <div class="col">
                <div class="card" style="background: linear-gradient(135deg, #e0f7fa, #ffffff); border-left: 4px solid #00bcd4;">
                            <div class="card-body p-2">
                <div class="energy-card">
                    <div class="card-title">Voltage</div>
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

            <div class="col">
                <div class="card" style="background:linear-gradient(135deg, #e8f5e9, #ffffff); border-left: 4px solid #4caf50;">
                            <div class="card-body p-2">
                <div class="energy-card">
                    <div class="card-title">Temperature</div>
                    <div class="card-value">
                        <span id="current">5.2</span>
                        <span class="unit">0</span>
                    </div>
                    <div class="riIcon" style="color: #4caf50;">
                        <i class="ri-temp-hot-fill"></i>
                    </div>
                </div>
                </div>
                </div>
            </div>

            <div class="col">
                <div class="card" style="background:linear-gradient(135deg, #fff3e0, #ffffff); border-left: 4px solid #ff9800;">
                            <div class="card-body p-2">
                <div class="energy-card">
                    <div class="card-title">Power</div>
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

            <div class="col">
                <div class="card" style="background: linear-gradient(135deg, #f3e5f5, #ffffff); border-left: 4px solid #9c27b0;">
                            <div class="card-body p-2">
                <div class="energy-card">
                    <div class="card-title">Energy Consumption</div>
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
                </div>
            </div>

        </div>


        <div class="row">
            <div class="card bg-transparent shadow-none p-0">
            <div class="card-body p-0">
                 <div class="row">

        <!-- Total Devices -->
        <div class="col">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-2">

                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="text-secondary mb-0 fs-4">Total Devices</h6>
                        <i class="ri-dashboard-line fs-1 text-dark"></i>
                    </div>

                    <h2 class="fw-bold fs-1">12</h2>

                    <p class="text-muted mb-0 small">
                        Connected Devices
                    </p>

                </div>
            </div>

        </div>

        <!-- Active Devices -->
        <div class="col">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-2">

                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="text-secondary mb-0 fs-4">Active Devices</h6>
                        <i class="ri-cpu-line fs-1 text-success"></i>
                    </div>

                    <h2 class="fw-bold fs-1">8</h2>

                    <p class="text-success mb-0 small">
                        Currently Running
                    </p>

                </div>
            </div>

        </div>

        <!-- Device Capacity -->
        <div class="col">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-2">

                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="text-secondary mb-0 fs-4">Load Capacity</h6>
                        <i class="ri-database-2-line fs-1 text-danger"></i>
                    </div>

                    <h2 class="fw-bold fs-1">
                        85%
                    </h2>

                    <p class="text-danger mb-0 small">
                        Near Maximum Limit
                    </p>

                </div>
            </div>

        </div>

        <!-- Estimated Bill -->
        <div class="col">

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-2">

                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="text-secondary mb-0 fs-4">Estimated Bill</h6>
                        <i class="ri-money-dollar-circle-line fs-1 text-primary"></i>
                    </div>

                    <h2 class="fw-bold fs-1">
                        $1,240
                    </h2>

                    <p class="text-primary mb-0 small">
                        Current Month
                    </p>

                </div>
            </div>

        </div>

    </div>

            </div>
        </div>
        </div>

          <!-- Second Row -->
        <div class="row mt-1">

            <div class="card p-0">
                <div class="card-body p-0 bg-transparent">
                           

                <div class="chart-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h3 class="mb-0">⚡ Live Power Usage </h3>
                    </div>

                    <canvas id="powerChart" height="100"></canvas>
                </div>

            </div>
            </div>

            
            </div>

        </div>

        <div class="row">
    <div class="card">
        <div class="card-body px-0">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header bg-white border-0 pb-2 ps-0">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-0 fw-bold">
                    <i class="ri-flashlight-line text-warning"></i>
                    Recent Energy Logs
                </h3>
            </div>
        </div>

                <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="basic-datatable"
                                class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                aria-describedby="basic-datatable_info" style="position: relative; width: 100%;">

                                <thead>
                                    <tr>
                                        <th class="sorting gridjs-th sorting_asc" tabindex="0"
                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                            aria-sort="ascending">
                                            Time
                                        </th>

                                        <th class="sorting gridjs-th" tabindex="0" aria-controls="basic-datatable"
                                            rowspan="1" colspan="1">
                                            Voltage
                                        </th>

                                        <th class="sorting gridjs-th" tabindex="0" aria-controls="basic-datatable"
                                            rowspan="1" colspan="1">
                                            Current
                                        </th>

                                        <th class="sorting gridjs-th" tabindex="0" aria-controls="basic-datatable"
                                            rowspan="1" colspan="1">
                                            Power
                                        </th>

                                        <th class="sorting gridjs-th" tabindex="0" aria-controls="basic-datatable"
                                            rowspan="1" colspan="1">
                                            Energy
                                        </th>

                                        <th class="sorting gridjs-th" tabindex="0" aria-controls="basic-datatable"
                                            rowspan="1" colspan="1">
                                            Power Factor
                                        </th>


                                    </tr>
                                </thead>

                                <tbody id="logTable">

                                    <tr class="odd">

                                        <td class="dtr-control sorting_1" tabindex="0">
                                            12:01 PM
                                        </td>

                                        <td>230 V</td>

                                        <td>5.1 A</td>

                                        <td>1.4 kW</td>

                                        <td>12.3 kWh</td>

                                        <td>0.95</td>



                                    </tr>


                                </tbody>

                            </table>

                        </div>
                    </div>

                </div>
            </div> <!-- end card body-->

            <div class="col-lg-4">
                <div class="card">

                    <div class="device-info h-100">

                        <h3 class="mb-3">Device Information</h3>

                        <div class="mb-2">
                            <strong>Smart Meter</strong>
                            <div class="text-secondary">
                                Schneider EM6436
                            </div>
                        </div>

                        <div class="mb-2">
                            <strong>Connection</strong>
                            <div class="text-secondary">
                                RS485 Modbus
                            </div>
                        </div>

                        <div class="mb-2">
                            <strong>Power Factor</strong>
                            <div class="text-secondary">
                                <span id="pf">0.96</span>
                            </div>
                        </div>

                        <div class="mb-2">
                            <strong>CT Clamp</strong>
                            <div class="text-secondary">
                                Active
                            </div>
                        </div>

                        <div>
                            <strong>Monitoring Status</strong>
                            <div class="text-success">
                                Running Smoothly
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
</div> 


<div class="row">
    <div class="card border-0 shadow-sm rounded-4 p-0">

        <div class="card-header bg-white border-0 p-4 pb-0">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="mb-0 fw-bold">
                    <i class="ri-flashlight-line text-warning"></i>
                    Device Power Consumption
                </h3>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="basic-datatable" class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline">

                    <thead class="table-light">

                        <tr>
                            <th>Device Name</th>
                            <th>Status</th>
                            <th>Voltage</th>
                            <th>Current</th>
                            <th>Power Usage</th>
                            <th>Capacity</th>
                            <th>Energy Used</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>Air Conditioner</td>

                            <td>
                                <span class="badge bg-success">
                                    Running
                                </span>
                            </td>

                            <td>230 V</td>

                            <td>4.2 A</td>

                            <td>1.8 kW</td>

                            <td>2.0 kW</td>

                            <td>5.4 kWh</td>

                            

                        </tr>

                        <tr>

                            <td>Refrigerator</td>

                            <td>
                                <span class="badge bg-success">
                                    Running
                                </span>
                            </td>

                            <td>220 V</td>

                            <td>1.1 A</td>

                            <td>0.45 kW</td>

                            <td>1.0 kW</td>

                            <td>2.1 kWh</td>

                            

                        </tr>

                        <tr>

                            <td>Washing Machine</td>

                            <td>
                                <span class="badge bg-danger">
                                    Off
                                </span>
                            </td>

                            <td>0 V</td>

                            <td>0 A</td>

                            <td>0 kW</td>

                            <td>1.5 kW</td>

                            <td>0.0 kWh</td>

                            

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>




                    </div><!-- end col-->

                </div> <!-- end row-->
























            



        </div>





    </div>

    <!-- END wrapper -->

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        // Live Time
        function updateClock() {
            const now = new Date();
            document.getElementById("liveTime").innerHTML = now.toLocaleString();
        }

        setInterval(updateClock, 1000);

        // Chart Setup
        const ctx = document.getElementById('powerChart');

        const chartData = {
            labels: [],
            datasets: [{
                label: 'Power Usage (kW)',
                data: [],
                borderWidth: 3,
                tension: 0.4
            }]
        };

        const powerChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            color: '#6c757d'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#6c757d'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#6c757d'
                        }
                    }
                }
            }
        });

        // Generate Live Random Data
        function updateData() {

            let voltage = (220 + Math.random() * 20).toFixed(0);
            let current = (4 + Math.random() * 3).toFixed(1);
            let power = (1 + Math.random() * 2).toFixed(2);
            let energy = (10 + Math.random() * 5).toFixed(2);
            let pf = (0.90 + Math.random() * 0.09).toFixed(2);

            document.getElementById('voltage').innerText = voltage;
            document.getElementById('current').innerText = current;
            document.getElementById('power').innerText = power;
            document.getElementById('energy').innerText = energy;
            document.getElementById('pf').innerText = pf;

            const currentTime = new Date().toLocaleTimeString();

            chartData.labels.push(currentTime);
            chartData.datasets[0].data.push(power);

            if (chartData.labels.length > 10) {
                chartData.labels.shift();
                chartData.datasets[0].data.shift();
            }

            powerChart.update();

            // Add Table Log
            const table = document.getElementById('logTable');

            const row = `
                <tr>
                    <td>${currentTime}</td>
                    <td>${voltage} V</td>
                    <td>${current} A</td>
                    <td>${power} kW</td>
                    <td>${energy} kWh</td>
                    <td>${pf}</td>
                </tr>
            `;

            table.insertAdjacentHTML('afterbegin', row);

            // Keep only 5 rows
            while (table.rows.length > 5) {
                table.deleteRow(5);
            }

        }

        setInterval(updateData, 2000);

    </script>



@include('client.include.footer')

