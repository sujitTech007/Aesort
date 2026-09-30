@php($pageTitle = 'Energy Readings - Aesort')
@include('client.include.header')

<style>
    .energy-readings .reading-summary { min-height: 118px; }
    .energy-readings .reading-value { font-size: 1.65rem; font-weight: 700; line-height: 1.2; }
    .energy-readings .reading-unit { color: var(--bs-secondary-color); font-size: .85rem; }
    .energy-readings .empty-state { min-height: 220px; display: grid; place-content: center; text-align: center; }
    .energy-readings .empty-state i { font-size: 2rem; }
</style>

<div class="page-content energy-readings">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-3">
                @include('client.include.sidebar-nav')
            </div>
            <div class="col-md-9">
                <div class="page-content-col">
                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
                        <div>
                            <h2 class="fw-bold mb-1">Energy Readings</h2>
                            <p class="text-muted mb-0">Stored measurements received from your site's devices.</p>
                        </div>
                        <span class="badge bg-light text-secondary border">{{ number_format($totalReadings) }} readings</span>
                    </div>

                    <form method="GET" action="{{ route('client.energy-readings') }}" class="card mb-3">
                        <div class="card-body d-flex flex-wrap align-items-end gap-2">
                            <div class="flex-grow-1" style="min-width: 220px; max-width: 480px;">
                                <label for="device_id" class="form-label">Device</label>
                                <select id="device_id" name="device_id" class="form-select">
                                    <option value="">All your devices</option>
                                    @foreach($devices as $device)
                                        <option value="{{ $device->id }}" {{ (string) request('device_id') === (string) $device->id ? 'selected' : '' }}>
                                            {{ $device->site->name ?? 'Site' }} / {{ $device->name }} ({{ $device->serial_number }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="ri-filter-3-line me-1"></i>Filter</button>
                            @if(request()->filled('device_id'))
                                <a href="{{ route('client.energy-readings') }}" class="btn btn-outline-secondary">Clear</a>
                            @endif
                        </div>
                    </form>

                    @if($latestReading)
                        <div class="row row-cols-2 row-cols-xl-5 g-3 mb-3">
                            <div class="col"><div class="card reading-summary"><div class="card-body"><div class="text-muted small mb-2">Voltage</div><div class="reading-value">{{ $latestReading->voltage !== null ? number_format($latestReading->voltage, 1) : '—' }} <span class="reading-unit">V</span></div></div></div></div>
                            <div class="col"><div class="card reading-summary"><div class="card-body"><div class="text-muted small mb-2">Current</div><div class="reading-value">{{ $latestReading->current !== null ? number_format($latestReading->current, 2) : '—' }} <span class="reading-unit">A</span></div></div></div></div>
                            <div class="col"><div class="card reading-summary"><div class="card-body"><div class="text-muted small mb-2">Power</div><div class="reading-value">{{ $latestReading->power !== null ? number_format($latestReading->power, 2) : '—' }} <span class="reading-unit">kW</span></div></div></div></div>
                            <div class="col"><div class="card reading-summary"><div class="card-body"><div class="text-muted small mb-2">Energy</div><div class="reading-value">{{ $latestReading->energy !== null ? number_format($latestReading->energy, 2) : '—' }} <span class="reading-unit">kWh</span></div></div></div></div>
                            <div class="col"><div class="card reading-summary"><div class="card-body"><div class="text-muted small mb-2">Temperature</div><div class="reading-value">{{ $latestReading->temperature !== null ? number_format($latestReading->temperature, 1) : '—' }} <span class="reading-unit">°C</span></div></div></div></div>
                        </div>
                        <p class="text-muted small mb-3">Latest measurement time: {{ $latestReading->reading_time?->format('M d, Y h:i:s A') ?? 'Timestamp unavailable' }} · {{ $latestReading->device->site->name ?? 'Site' }} / {{ $latestReading->device->name ?? 'Device' }}</p>
                    @endif

                    <div class="card">
                        <div class="card-header bg-transparent d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <h5 class="card-title mb-0">Reading history</h5>
                            <span class="text-muted small">Newest first · maximum 50 per page</span>
                        </div>
                        @if($readings->count())
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead><tr><th>Recorded at</th><th>Site / Device</th><th class="text-end">Voltage (V)</th><th class="text-end">Current (A)</th><th class="text-end">Power (kW)</th><th class="text-end">Energy (kWh)</th><th class="text-end">Temperature (°C)</th><th>Status</th></tr></thead>
                                    <tbody>
                                        @foreach($readings as $reading)
                                            <tr>
                                                <td class="text-nowrap">{{ $reading->reading_time?->format('M d, Y h:i:s A') ?? 'Timestamp unavailable' }}</td>
                                                <td>{{ $reading->device->site->name ?? 'Site' }}<div class="small text-muted">{{ $reading->device->name ?? 'Device' }} · {{ $reading->device->serial_number ?? '' }}</div></td>
                                                <td class="text-end">{{ $reading->voltage !== null ? number_format($reading->voltage, 1) : '—' }}</td>
                                                <td class="text-end">{{ $reading->current !== null ? number_format($reading->current, 2) : '—' }}</td>
                                                <td class="text-end">{{ $reading->power !== null ? number_format($reading->power, 2) : '—' }}</td>
                                                <td class="text-end">{{ $reading->energy !== null ? number_format($reading->energy, 2) : '—' }}</td>
                                                <td class="text-end">{{ $reading->temperature !== null ? number_format($reading->temperature, 1) : '—' }}</td>
                                                <td><span class="badge {{ $reading->status === 'anomaly' ? 'bg-warning-subtle text-warning' : 'bg-success-subtle text-success' }}">{{ ucfirst($reading->status ?: 'ok') }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-body border-top">{{ $readings->links('pagination::bootstrap-5') }}</div>
                        @else
                            <div class="card-body empty-state">
                                <div>
                                    <i class="ri-pulse-line text-muted"></i>
                                    <h5 class="mt-2">No device readings received yet</h5>
                                    <p class="text-muted mb-3">This page only shows measurements stored from authenticated device submissions. It does not use sample/demo values.</p>
                                    @if($devices->isEmpty())
                                        <a href="{{ route('client.devices') }}" class="btn btn-outline-primary">View devices</a>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning">{{ $devices->count() }} device(s) registered · waiting for readings</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.include.footer')
