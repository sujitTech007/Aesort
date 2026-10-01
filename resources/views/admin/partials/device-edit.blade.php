<form class="device-edit-form" data-device-id="{{ $device->id }}" action="{{ route('admin.devices.update', $device->id) }}" method="POST">
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
                            <label class="form-label">Asset / Equipment</label>
                            <input type="text" name="asset_name" class="form-control" value="{{ $device->asset_name }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Source unit</label>
                            <input type="text" name="source_unit" class="form-control" value="{{ $device->source_unit }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Expected reading interval (minutes)</label>
                            <input type="number" name="reading_interval_minutes" min="1" max="1440" class="form-control" value="{{ $device->reading_interval_minutes }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Firmware Version</label>
                            <input type="text" name="firmware_version" class="form-control" value="{{ $device->firmware_version }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Report Received</label>
                            <input type="text" class="form-control" value="{{ $device->last_active?->format('M d, Y H:i') ?? 'No report received' }}" readonly>
                            <div class="form-text">System telemetry; it cannot be manually edited.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Stored Status</label>
                            <input type="text" class="form-control" value="{{ $device->status ?: 'Unknown' }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Commissioned At</label>
                            <input type="text" class="form-control" value="{{ $device->installed_at?->format('M d, Y H:i') ?? 'Not recorded' }}" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Reason for change</label>
                            <textarea name="change_reason" class="form-control" minlength="8" maxlength="1000" required></textarea>
                            <div class="form-text">Required for audit history.</div>
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