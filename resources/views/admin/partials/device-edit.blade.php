<form class="device-edit-form" data-device-id="{{ $device->id }}" action="{{ route('admin.devices.update', $device->id) }}" method="POST">
    @csrf
    @method('PUT')
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="editDeviceId">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Site</label>
                            <select name="site_id" class="form-select">
                                <option value="">-- Select Site --</option>
                                @foreach($sites as $site)
                                    <option value="{{ $site->id }}" {{ $device->site_id == $site->id ? 'selected' : '' }}>
                                        {{ $site->name }} ({{ $site->address }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Serial Number</label>
                            <input type="text" name="serial_number" class="form-control" value="{{ $device->serial_number }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $device->name }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-select">
                                <option value="sensor" {{ $device->type == 'sensor' ? 'selected' : '' }}>Sensor</option>
                                <option value="meter" {{ $device->type == 'meter' ? 'selected' : '' }}>Meter</option>
                                <option value="gateway" {{ $device->type == 'gateway' ? 'selected' : '' }}>Gateway</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Firmware Version</label>
                            <input type="text" name="firmware_version" class="form-control" value="{{ $device->firmware_version }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Active</label>
                            <input type="datetime-local" name="last_active" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($device->last_active)) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="online" {{ $device->status == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ $device->status == 'offline' ? 'selected' : '' }}>Offline</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Installed At</label>
                            <input type="datetime-local" name="installed_at" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($device->installed_at)) }}">
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Update Device</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>