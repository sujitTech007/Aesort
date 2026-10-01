@include('admin.include.header')

<div class="page-content">
    <div class="page-title-head d-flex flex-wrap align-items-center gap-3">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-1">Reports &amp; Insights</h4>
            <p class="text-muted mb-0">Live counts from stored operational records. Savings values are only shown after an approved baseline and verification evidence.</p>
        </div>
        <a href="{{ route('admin.reports.customer-portfolio') }}" class="btn btn-primary"><i class="ri-download-2-line me-1"></i>Customer portfolio CSV</a>
        <a href="{{ route('admin.rollout.index') }}" class="btn btn-outline-secondary">Rollout workflows</a>
    </div>

    <div class="page-container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 g-3">
            @foreach($summary as $label => $count)
                <div class="col"><div class="card h-100"><div class="card-body"><div class="text-muted small">{{ $label }}</div><div class="fs-3 fw-bold mt-2">{{ number_format($count) }}</div></div></div></div>
            @endforeach
        </div>
        <div class="alert alert-info mt-4 mb-0">Energy-value, cost-savings, and benchmark performance results are intentionally not calculated from device inventory counts. Use the rollout workbench to enter baselines, evidence and approved benchmark versions.</div>
    </div>
</div>

@include('admin.include.footer')
