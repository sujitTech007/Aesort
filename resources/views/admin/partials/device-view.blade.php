<div class="modalListViwe-box">

    <div class="tableStatusList mb-1">

        <div class="row justify-content-between px-3">

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Application No:</h5>

                <p>{{ $device->site_id  }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Site id:</h5>

                <p>{{ $device->site_id  }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Serial Number:</h5>

                <p>{{ $device->serial_number  }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Name:</h5>

                <p>{{ $device->name }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Type:</h5>

                <p>{{ $device->type }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Firmware Version:</h5>

                <p>{{ $device->firmware_version }}</p>

            </div>

           

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Last Active:</h5>

                <p>{{ \Carbon\Carbon::parse($device->last_active)->format('d M Y | h:i A') }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Installed At:</h5>

                <p>{{ \Carbon\Carbon::parse($device->installed_at)->format('d M Y | h:i A') }}</p>

            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">

                <h5>Status:</h5>

                <p>{{ $device->status }}</p>

            </div>

        </div>

    </div>

</div>

<section class="border rounded p-3 mt-3">
    <h5 class="mb-2">Reading API setup @if($device->is_demo)<span class="badge bg-secondary">Demo data</span>@endif</h5>
    @if($device->is_demo)
        <div class="alert alert-secondary small">This is sample data for testing the admin device list. Demo devices are intentionally rejected by the readings API and are not shown in a customer's live portal.</div>
    @endif
    <p class="text-muted mb-2">Registering a device does not automatically provide meter readings. Configure the meter or gateway to send an HTTP POST request to the endpoint below for each reading. The gateway/API integration is configured in the device or gateway software, not in this website form.</p>
    <label class="form-label fw-semibold" for="device-reading-endpoint-{{ $device->id }}">Is device ka endpoint</label>
    <div class="input-group mb-3">
        <input id="device-reading-endpoint-{{ $device->id }}" type="text" class="form-control font-monospace" value="{{ url('/api/devices/' . $device->id . '/readings') }}" readonly>
        <button type="button" class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText(document.getElementById('device-reading-endpoint-{{ $device->id }}').value)">Copy URL</button>
    </div>
    <div class="small mb-2"><strong>Method:</strong> POST · <strong>Content-Type:</strong> application/json · <strong>Authentication:</strong> Authorization: Bearer &lt;customer Sanctum token&gt;</div>
    <p class="small text-warning mb-2">Important: The API currently requires a customer Sanctum token. This admin screen does not issue tokens. Before connecting a gateway, configure the customer's token securely in the gateway. Do not share the token on public or customer-facing screens.</p>
    <label class="form-label fw-semibold">JSON example</label>
    <pre class="bg-light border rounded p-2 mb-2"><code>{
  "reading_time": "2026-10-03T14:00:00Z",
  "voltage": 230,
  "current": 4.2,
  "power": 0.97,
  "energy": 12.5,
  "temperature": 22.4
}</code></pre>
    <p class="small text-muted mb-0">A successful request returns HTTP 201, saves the measurement to device_readings, and updates Last Report. The saved reading should then appear on the customer's Energy Readings page. Actual meter data must come from the gateway or firmware; the sample JSON is only a format example.</p>
</section>

