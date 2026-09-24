// Configurable thresholds
const CONFIG = {
    VOLTAGE_WARNING: 235,
    VOLTAGE_CRITICAL: 245,
    POWER_WARNING: 3.0,
    TEMP_INFO: 30,
    UPDATE_INTERVAL_MS: 2500,
    MAX_LOG_ROWS: 8,
    MAX_CHART_POINTS: 20
};

// Live Time
function updateClock() {
    const now = new Date();
    const el = document.getElementById("liveTime");
    if (el) el.innerHTML = now.toLocaleString();
}
setInterval(updateClock, 1000);

// Chart Setup
const powerCtx = document.getElementById('powerChart');
let powerChart = null;
const chartData = {
    labels: [],
    datasets: [{
        label: 'Power Usage (kW)',
        data: [],
        borderWidth: 2,
        tension: 0.36,
        pointRadius: 2,
        fill: true
    }]
};
if (powerCtx) {
    const ctx = powerCtx.getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 220);
    gradient.addColorStop(0, 'rgba(2,188,212,0.22)');
    gradient.addColorStop(1, 'rgba(2,188,212,0.02)');
    chartData.datasets[0].backgroundColor = gradient;
    chartData.datasets[0].borderColor = '#02bcd4';

    powerChart = new Chart(ctx, {
        type: 'line',
        data: chartData,
        options: {
            maintainAspectRatio: false,
            responsive: true,
            interaction: { mode: 'index', intersect: false },
            scales: {
                y: {
                    ticks: { color: '#6c757d' },
                    grid: { color: 'rgba(15,23,42,0.04)' }
                },
                x: {
                    ticks: { color: '#6c757d' },
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { labels: { color: '#6c757d' } },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#ffffff',
                    bodyColor: '#e6eef3',
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' kW';
                        }
                    }
                }
            },
            elements: {
                line: { borderWidth: 2, borderJoinStyle: 'round' }
            }
        }
    });
}

let activeAlertCount = 0;
function updateAlertBadge() {
    const badge = document.getElementById('alertCountBadge');
    const activeAlerts = document.getElementById('activeAlerts');
    if (badge) badge.innerText = `${activeAlertCount} active`;
    if (activeAlerts) activeAlerts.innerText = activeAlertCount;
}

function pushAlert(type, title, message, severity = 'warning') {

    const container = document.getElementById('alertToastContainer');

    if (!container) return;


    // =====================================================
    // IMPORTANT:
    // Agar already ek alert visible/existing hai,
    // to doosra alert create mat karo.
    // =====================================================

    const existingAlert = container.querySelector('.toast-alert');

    if (existingAlert) {
        return;
    }


    // =====================================================
    // Alert color
    // =====================================================

    const color =
        severity === 'critical'
            ? 'danger'
            : (severity === 'info' ? 'info' : 'warning');


    // =====================================================
    // Unique Toast ID
    // =====================================================

    const toastId =
        'toast-' + Date.now() + Math.floor(Math.random() * 1000);


    // =====================================================
    // Toast HTML
    // =====================================================

    const html = `
        <div
            id="${toastId}"
            class="toast toast-alert align-items-center text-bg-${color} border-0 mb-3"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
        >

            <div class="d-flex">

                <div class="toast-body">

                    <div class="fw-bold">
                        ${title}
                    </div>

                    <div class="small">
                        ${message}
                    </div>

                    <div class="text-white-50 small mt-1">
                        ${new Date().toLocaleTimeString()}
                    </div>

                </div>


                <button
                    type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                ></button>

            </div>

        </div>
    `;


    // Add alert
    container.insertAdjacentHTML('beforeend', html);


    const toastEl = document.getElementById(toastId);


    if (toastEl) {

        const toast = new bootstrap.Toast(toastEl, {
            delay: 8000,
            autohide: true
        });


        // =================================================
        // Alert show
        // =================================================

        toast.show();


        // =================================================
        // Alert close / hide
        // =================================================

        toastEl.addEventListener('hidden.bs.toast', function () {

            activeAlertCount = Math.max(0, activeAlertCount - 1);

            updateAlertBadge();

            toastEl.remove();

        }, { once: true });

    }


    // =====================================================
    // Alert count
    // =====================================================

    activeAlertCount += 1;

    updateAlertBadge();
}

// Populate static demo scenario table
function renderScenarioTable() {
    const tbody = document.getElementById('scenarioBody');
    if (!tbody) return;
    const rows = [
        ['Facility Name', 'AESORT Demo Office / Maple Business Centre'],
        ['Building Type', 'Commercial Office'],
        ['Operating Hours', 'Mon–Fri 08:00–18:00'],
        ['After-hours', '18:00–08:00'],
        ['Monthly Energy Cost', 'CAD 10,000–12,000'],
        ['Target Savings', '10–15%']
    ];

    rows.forEach(r => {
        const tr = `<tr><th>${r[0]}</th><td>${r[1]}</td></tr>`;
        tbody.insertAdjacentHTML('beforeend', tr);
    });
}

// Update facility metrics with simulated values
function updateFacilityMetrics(power, energy) {
    const demand = (power * 1.2).toFixed(2);
    const costToday = (energy * 0.15).toFixed(2);
    const fd = document.getElementById('facilityDemand');
    const et = document.getElementById('energyToday');
    const ec = document.getElementById('estCost');
    const pd = document.getElementById('peakDemand');
    const aa = document.getElementById('activeAlerts');
    if (fd) fd.innerText = demand + ' kW';
    if (et) et.innerText = energy + ' kWh';
    if (ec) ec.innerText = '$' + costToday;
    if (pd) pd.innerText = (power + 0.5).toFixed(2) + ' kW';
    if (aa) aa.innerText = activeAlertCount;
}

// Generate Live Random Data and alerts
function updateData() {
    let voltage = Number((220 + Math.random() * 30).toFixed(0));
    let current = Number((3 + Math.random() * 4).toFixed(1));
    let power = Number((1 + Math.random() * 3).toFixed(2));
    let energy = Number((10 + Math.random() * 8).toFixed(2));
    let pf = Number((0.85 + Math.random() * 0.14).toFixed(2));
    let temp = Number((18 + Math.random() * 12).toFixed(1));

    const elVoltage = document.getElementById('voltage');
    const elCurrent = document.getElementById('current');
    const elPower = document.getElementById('power');
    const elEnergy = document.getElementById('energy');
    const elPf = document.getElementById('pf');

    if (elVoltage) elVoltage.innerText = voltage;
    if (elCurrent) elCurrent.innerText = current;
    if (elPower) elPower.innerText = power;
    if (elEnergy) elEnergy.innerText = energy;
    if (elPf) elPf.innerText = pf;

    const currentTime = new Date().toLocaleTimeString();

    chartData.labels.push(currentTime);
    chartData.datasets[0].data.push(power);

    if (chartData.labels.length > CONFIG.MAX_CHART_POINTS) {
        chartData.labels.shift();
        chartData.datasets[0].data.shift();
    }

    if (powerChart) {
        powerChart.update();
    }

 // Add Table Log
const table = document.getElementById('logTable');

if (table) {

    // Determine status
    let statusText = 'Normal';
    let statusClass = 'bg-success';

    if (voltage > CONFIG.VOLTAGE_CRITICAL) {
        statusText = 'Alert';
        statusClass = 'bg-danger';
    } 
    else if (voltage > CONFIG.VOLTAGE_WARNING) {
        statusText = 'High Voltage';
        statusClass = 'bg-warning text-dark';
    }
    else if (power > CONFIG.POWER_WARNING) {
        statusText = 'High Load';
        statusClass = 'bg-warning text-dark';
    }

    const row = `
        <tr>
            <td>
                <i class="ri-time-line me-1 text-muted"></i>
                ${currentTime}
            </td>
            <td>${voltage} V</td>
            <td>${current} A</td>
            <td>${power} kW</td>
            <td>${energy} kWh</td>
            <td>${pf}</td>
            <td>
                <span class="badge ${statusClass}">
                    ${statusText}
                </span>
            </td>
        </tr>
    `;

    table.insertAdjacentHTML('afterbegin', row);

    // Keep only MAX_LOG_ROWS rows
    while (table.rows.length > CONFIG.MAX_LOG_ROWS) {
        table.deleteRow(CONFIG.MAX_LOG_ROWS);
    }
}

    // Facility metrics
    updateFacilityMetrics(power, energy);

    // Alert logic using CONFIG thresholds
    if (voltage > CONFIG.VOLTAGE_CRITICAL) {
        pushAlert('voltage', 'High Voltage', `Voltage is ${voltage} V — possible spike`, 'critical');
    } else if (voltage > CONFIG.VOLTAGE_WARNING) {
        pushAlert('voltage', 'Voltage Warning', `Voltage ${voltage} V exceeding typical range`, 'warning');
    }

    if (power > CONFIG.POWER_WARNING) {
        pushAlert('power', 'High Power Load', `Power ${power} kW is above threshold`, 'warning');
    }

    if (temp > CONFIG.TEMP_INFO) {
        pushAlert('temp', 'High Temperature', `Room temperature ${temp}°C — check HVAC`, 'info');
    }

    // Random anomaly event (rare)
    if (Math.random() > 0.97) {
        pushAlert('anomaly', 'Sensor Fault', 'Frozen/bad reading detected on Sensor 04', 'critical');
    }
}

setInterval(updateData, CONFIG.UPDATE_INTERVAL_MS);

// Space data for drill-down
const SPACES = {
    main_building: {
        id: 'main_building',
        title: 'Main Building',
        status: 'Healthy',
        badgeClass: 'bg-success',
        desc: 'Main control hub with incoming metering, system coordination and demand shedding oversight.',
        details: [
            'Primary focus: Overall facility demand, load balancing and distribution losses.',
            'Key assets: Transformer, main switchgear, UPS, campus submeters.',
            'Priority: Ensure peak demand is managed and voltage is stable across the facility.'
        ],
        recommendations: 'Verify main meter calibration, optimize demand response thresholds, and align controls with time-of-use tariffs.',
        metrics: { voltage: 236, current: 3.2, power: 120.4 },
        devices: [
            { name: 'Transformer Main A', power: '34.5 kW', status: 'Online' },
            { name: 'UPS Bank 1', power: '18.2 kW', status: 'Healthy' },
            { name: 'Campus Meter', power: '22.8 kW', status: 'Normal' },
            { name: 'Main Distribution Panel', power: '44.9 kW', status: 'Stable' }
        ],
        summary: 'Overview of the building’s incoming metering, distribution network and key energy flow points.',
        focus: 'Balancing overall facility demand while protecting key infrastructure.',
        health: 'Healthy',
        priority: 'Low'
    },
    workspace: {
        id: 'workspace',
        title: 'Workspace',
        status: 'Monitored',
        badgeClass: 'bg-info',
        desc: 'Office space energy use driven by lighting, plug loads, HVAC and occupancy behavior.',
        details: [
            'Primary focus: Lighting schedules, plug load reduction and occupancy sensing.',
            'Key assets: Desks, monitors, meeting zones, HVAC split systems.',
            'Priority: Reduce standby energy and automate non-essential loads after hours.'
        ],
        recommendations: 'Deploy smart lighting controls, add presence sensors to conference zones, and enforce work-hour shutdown policies.',
        metrics: { voltage: 231, current: 12.1, power: 34.0 },
        devices: [
            { name: 'Workstation Row A', power: '7.4 kW', status: 'Nominal' },
            { name: 'Lighting Bank', power: '6.2 kW', status: 'Controlled' },
            { name: 'Conference Screen', power: '4.8 kW', status: 'Standby' },
            { name: 'HVAC Split Unit', power: '15.6 kW', status: 'Running' }
        ],
        summary: 'Workspace energy behavior focused on desks, meeting zones and plug loads.',
        focus: 'Optimizing occupancy systems and schedule-driven power reduction.',
        health: 'Monitored',
        priority: 'Medium'
    },
    server_room: {
        id: 'server_room',
        title: 'Server Room',
        status: 'Critical',
        badgeClass: 'bg-warning',
        desc: 'Critical infrastructure area requiring tight cooling control, redundancy and power quality monitoring.',
        details: [
            'Primary focus: Rack power draw, cooling performance and fault tolerance.',
            'Key assets: Servers, UPS, CRAC units, backup generators.',
            'Priority: Protect uptime while avoiding thermal stress from uneven loading.'
        ],
        recommendations: 'Monitor inlet/outlet temperatures, validate UPS load sharing, and keep non-essential equipment off during peak load.',
        metrics: { voltage: 239, current: 18.4, power: 46.0 },
        devices: [
            { name: 'Server Rack 1', power: '12.3 kW', status: 'Critical' },
            { name: 'UPS System', power: '9.8 kW', status: 'Healthy' },
            { name: 'Cooling Unit', power: '14.2 kW', status: 'Running' },
            { name: 'Networking Gear', power: '9.7 kW', status: 'Normal' }
        ],
        summary: 'Server room operations and cooling load with a focus on risk mitigation.',
        focus: 'Maintaining uptime while cooling and redundancy are under load.',
        health: 'Critical',
        priority: 'High'
    },
    cafeteria: {
        id: 'cafeteria',
        title: 'Cafeteria',
        status: 'Attention',
        badgeClass: 'bg-danger',
        desc: 'Food service area with ovens, refrigeration and lighting where after-hours loads often remain unattended.',
        details: [
            'Primary focus: Kitchen equipment energy use, after-hours standby and peak lunch demand.',
            'Key assets: Ovens, warmers, refrigerators, coffee machines and lighting.',
            'Priority: Prevent equipment left on after hours and smooth lunch-time energy spikes.'
        ],
        recommendations: 'Install timers and smart plugs, enforce shutdown procedures, and add occupancy-aware controls for kitchen appliances.',
        metrics: { voltage: 228, current: 10.5, power: 28.2 },
        devices: [
            { name: 'Oven Line', power: '10.6 kW', status: 'Attention' },
            { name: 'Refrigerator Bank', power: '7.4 kW', status: 'On' },
            { name: 'Coffee Station', power: '4.2 kW', status: 'Idle' },
            { name: 'Lighting Group', power: '6.0 kW', status: 'Active' }
        ],
        summary: 'Kitchen and dining equipment load with attention to after-hours usage and refrigeration demand.',
        focus: 'Reducing after-hours standby and controlling refrigeration energy.',
        health: 'Attention',
        priority: 'High'
    },
    meeting_room: {
        id: 'meeting_room',
        title: 'Meeting Room',
        status: 'Stable',
        badgeClass: 'bg-secondary',
        desc: 'Collaboration area with AV systems, lighting controls and occupancy-dependent HVAC.',
        details: [
            'Primary focus: AV readiness, HVAC scheduling and eliminating idle energy use.',
            'Key assets: Displays, projectors, conferencing gear and thermostats.',
            'Priority: Turn off AV and climate systems when rooms are unused.'
        ],
        recommendations: 'Use scheduling data to power down equipment during gaps and optimize HVAC based on room booking patterns.',
        metrics: { voltage: 226, current: 5.9, power: 12.0 },
        devices: [
            { name: 'Projector System', power: '4.0 kW', status: 'Standby' },
            { name: 'Conference Lighting', power: '3.5 kW', status: 'Active' },
            { name: 'Climate Control', power: '2.8 kW', status: 'Scheduled' },
            { name: 'AV Mixer', power: '1.7 kW', status: 'Normal' }
        ],
        summary: 'Meeting room operations and occupancy-driven load for AV and HVAC systems.',
        focus: 'Keeping AV and climate systems aligned with booked usage.',
        health: 'Stable',
        priority: 'Low'
    }
};

let spaceChartInstance = null;

function getQueryParam(name) {
    return new URLSearchParams(window.location.search).get(name);
}

function renderSpaceDetailPage(spaceId) {
    const page = document.getElementById('spaceDetailPage');
    if (!page) return;

    const space = SPACES[spaceId];
    const title = document.getElementById('detailTitle');
    const badge = document.getElementById('detailStatusBadge');
    const updatedAt = document.getElementById('detailUpdatedAt');
    const desc = document.getElementById('detailDesc');
    const overview = document.getElementById('detailOverview');
    const rec = document.getElementById('detailRec');
    const deviceTable = document.getElementById('detailDeviceTableBody');
    const metricVoltage = document.getElementById('detailVoltage');
    const metricCurrent = document.getElementById('detailCurrent');
    const metricPower = document.getElementById('detailPower');
    const summary = document.getElementById('detailSummary');
    const focus = document.getElementById('detailFocus');
    const healthStatus = document.getElementById('detailHealthStatus');
    const peakPower = document.getElementById('detailPeakPower');
    const deviceCount = document.getElementById('detailDeviceCount');
    const priority = document.getElementById('detailPriority');

    if (!space) {
        page.innerHTML = `
            <div class="alert alert-warning rounded-4 shadow-sm">
                <h5 class="mb-2">Area report unavailable</h5>
                <p class="mb-0">Please return to the dashboard and select a valid space.</p>
                <a href="https://aesort.ca/UAT/public/view-spaces" class="btn btn-outline-primary btn-sm mt-3">Back to Dashboard</a>
            </div>
        `;
        return;
    }

    if (title) title.innerText = space.title;
    if (badge) {
        badge.innerText = space.status || 'Active';
        badge.className = `badge text-uppercase ${space.badgeClass || 'bg-primary'} fs-7`;
    }
    if (updatedAt) updatedAt.innerText = `Updated ${new Date().toLocaleTimeString()}`;
    if (desc) desc.innerText = space.desc;
    if (summary) summary.innerText = space.summary || `Device-level load profile and operational recommendations for ${space.title.toLowerCase()}.`;
    if (focus) focus.innerText = space.focus || 'Evaluating device and energy status for the selected area.';
    if (healthStatus) healthStatus.innerText = space.health || 'Stable';
    if (peakPower) peakPower.innerText = space.metrics ? `${space.metrics.power} kW` : '- kW';
    if (deviceCount) deviceCount.innerText = space.devices ? space.devices.length : '-';
    if (priority) priority.innerText = space.priority || 'Normal';

    if (overview) {
        overview.innerHTML = '';
        space.details.forEach(detail => {
            overview.insertAdjacentHTML('beforeend', `<li class="mb-2">${detail}</li>`);
        });
    }
    if (rec) rec.innerText = space.recommendations;
    if (deviceTable) {
        deviceTable.innerHTML = '';
        space.devices.forEach(device => {
            deviceTable.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${device.name}</td>
                    <td>${device.power}</td>
                    <td>${device.status}</td>
                </tr>
            `);
        });
    }

    if (metricVoltage) metricVoltage.innerText = space.metrics ? `${space.metrics.voltage} V` : '- V';
    if (metricCurrent) metricCurrent.innerText = space.metrics ? `${space.metrics.current} A` : '- A';
    if (metricPower) metricPower.innerText = space.metrics ? `${space.metrics.power} kW` : '- kW';

    const chartEl = document.getElementById('spaceDetailChart');
    if (chartEl) {
        if (spaceChartInstance) {
            try { spaceChartInstance.destroy(); } catch (e) {}
        }
        const labels = space.devices.map(device => device.name);
        const values = space.devices.map(device => Number(device.power.replace(/[^0-9.]/g, '')));
        spaceChartInstance = new Chart(chartEl, {
            type: 'bar',
            data: {
                labels,
                datasets: [{
                    label: 'Device Power (kW)',
                    data: values,
                    backgroundColor: 'rgba(2,188,212,0.72)',
                    borderColor: '#02bcd4',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#6c757d' }
                    },
                    x: {
                        ticks: { color: '#6c757d' }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }
}

// attach render logic for dashboard and detail pages
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('scenarioBody')) {
        renderScenarioTable();
    }
    const selectedSpace = getQueryParam('space');
    if (selectedSpace && document.getElementById('spaceDetailPage')) {
        renderSpaceDetailPage(selectedSpace);
    }
    updateData();
});
