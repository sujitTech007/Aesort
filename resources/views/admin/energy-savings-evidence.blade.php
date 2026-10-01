@include('admin.include.header')

<div class="page-content">
    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Savings Evidence</h4>
        </div>
    </div>

    <div class="page-container">
        <div class="row g-3 mb-4">
           <div class="col-md-3">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small text-uppercase fw-bold mb-2">Sites</p>
                    <h3 class="fw-bold mb-0">{{ number_format($totalSites) }}</h3>
                </div>

                <div class="text-primary fs-2">
                    <i class="fas fa-building"></i>
                </div>
            </div>
        </div>
    </div>
</div>
          <div class="col-md-3">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small text-uppercase fw-bold mb-2">Devices</p>
                    <h3 class="fw-bold mb-0">{{ number_format($totalDevices) }}</h3>
                </div>

                <div class="text-primary fs-2">
                    <i class="fa-solid fa-microchip"></i>
                </div>
            </div>
        </div>
    </div>
</div>
           <div class="col-md-3">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small text-uppercase fw-bold mb-2">Readings</p>
                    <h3 class="fw-bold mb-0">{{ number_format($totalReadings) }}</h3>
                </div>

                <div class="text-primary fs-2">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
            </div>
        </div>
    </div>
</div>
           <div class="col-md-3">
    <div class="card h-100">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small text-uppercase fw-bold mb-2">Average power</p>
                    <h3 class="fw-bold mb-0">{{ $avgPower !== null ? number_format($avgPower, 2) : '—' }} kW</h3>
                </div>

                <div class="text-primary fs-2">
                    <i class="fa-solid fa-bolt"></i>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <h5 class="fw-bold mb-0">Latest recorded evidence</h5>
                    <span class="text-muted small">Source: imported device readings</span>
                </div>

                @if($latestReading)
                    <div class="row g-3 mb-3">
                        <div class="col-md-3"><div class="border rounded p-3"><div class="text-muted small">Voltage</div><h5 class="mb-0 mt-2">{{ number_format($latestReading->voltage ?? 0, 2) }} V</h5></div></div>
                        <div class="col-md-3"><div class="border rounded p-3"><div class="text-muted small">Current</div><h5 class="mb-0 mt-2">{{ number_format($latestReading->current ?? 0, 2) }} A</h5></div></div>
                        <div class="col-md-3"><div class="border rounded p-3"><div class="text-muted small">Power</div><h5 class="mb-0 mt-2">{{ number_format($latestReading->power ?? 0, 2) }} kW</h5></div></div>
                        <div class="col-md-3"><div class="border rounded p-3"><div class="text-muted small">Energy</div><h5 class="mb-0 mt-2">{{ number_format($latestReading->energy ?? 0, 2) }} kWh</h5></div></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Read Time</th>
                                    <th>Voltage</th>
                                    <th>Current</th>
                                    <th>Power</th>
                                    <th>Energy</th>
                                    <th>Temperature</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $latestReading->reading_time?->format('M d, Y h:i:s A') ?? 'Timestamp unavailable' }}</td>
                                    <td>{{ $latestReading->voltage !== null ? number_format($latestReading->voltage, 2) . ' V' : '—' }}</td>
                                    <td>{{ $latestReading->current !== null ? number_format($latestReading->current, 2) . ' A' : '—' }}</td>
                                    <td>{{ $latestReading->power !== null ? number_format($latestReading->power, 2) . ' kW' : '—' }}</td>
                                    <td>{{ $latestReading->energy !== null ? number_format($latestReading->energy, 2) . ' kWh' : '—' }}</td>
                                    <td>{{ $latestReading->temperature !== null ? number_format($latestReading->temperature, 2) . ' °C' : '—' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-light border mb-0">
                        No energy readings have been stored yet, so no savings evidence is available.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('admin.include.footer')
