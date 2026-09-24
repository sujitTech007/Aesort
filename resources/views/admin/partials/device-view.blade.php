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

