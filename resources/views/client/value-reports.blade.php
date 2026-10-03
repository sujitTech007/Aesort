@php($pageTitle = 'Value Reports - AESORT')
@include('client.include.header')

<div class="page-content">
    <div class="container">
        <div class="row g-3">
            <aside class="col-lg-3">@include('client.include.sidebar-nav')</aside>
            <main class="col-lg-9"><div class="page-content-col">
                <div class="mb-3"><h1 class="fs-3 fw-bold mb-1">Value reports</h1><p class="text-muted mb-0">Generate and retrieve reports from your account's stored readings and approved records.</p></div>
                <section class="card mb-3"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Generate value report</h2></div><div class="card-body">
                    <form method="POST" action="{{ route('client.value-reports.generate') }}" class="row g-3 align-items-end">@csrf
                        <div class="col-md-3"><label class="form-label" for="report-site">Portfolio scope</label><select id="report-site" name="site_id" class="form-select"><option value="">All my sites</option>@foreach($sites as $site)<option value="{{ $site->id }}">{{ $site->name }}</option>@endforeach</select></div>
                        <div class="col-md-2"><label class="form-label" for="report-start">From</label><input id="report-start" class="form-control" name="start_date" type="date" required max="{{ now()->toDateString() }}" value="{{ now()->startOfMonth()->toDateString() }}"></div>
                        <div class="col-md-2"><label class="form-label" for="report-end">To</label><input id="report-end" class="form-control" name="end_date" type="date" required max="{{ now()->toDateString() }}" value="{{ now()->toDateString() }}"></div>
                        <div class="col-md-2"><label class="form-label" for="report-format">Format</label><select id="report-format" name="format" class="form-select" required><option value="csv">CSV</option><option value="pdf">PDF</option></select></div>
                        <div class="col-md-2 d-grid"><button class="btn btn-primary" type="submit"><i class="ri-download-2-line me-1"></i>Generate</button></div>
                    </form>
                    <p class="small text-muted mt-3 mb-0">Reports identify unavailable comparisons rather than estimating missing energy, weather, occupancy, or cost data. PDF and CSV files are stored privately and only downloadable by your account.</p>
                </div></section>

                <section class="card"><div class="card-header bg-transparent"><h2 class="h6 mb-0">Report history</h2></div>
                    @if($reports->isNotEmpty())
                        <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Generated</th><th>Site scope</th><th>Reporting period</th><th>Format</th><th></th></tr></thead><tbody>
                            @foreach($reports as $report)
                                @php($reportSite = $sites->firstWhere('id', $report->site_id))
                                <tr><td>{{ \Carbon\Carbon::parse($report->generated_at)->format('M d, Y H:i') }}</td><td>{{ $report->site_id ? ($reportSite->name ?? 'Site unavailable') : 'All customer sites' }}</td><td>{{ $report->period_start }} – {{ $report->period_end }}</td><td>{{ strtoupper($report->format) }}</td><td class="text-end"><a href="{{ route('client.value-reports.download', $report->id) }}" class="btn btn-sm btn-outline-primary"><i class="ri-download-line me-1"></i>Download</a></td></tr>
                            @endforeach
                        </tbody></table></div><div class="card-body border-top">{{ $reports->links('pagination::bootstrap-5') }}</div>
                    @else
                        <div class="card-body text-center py-5"><i class="ri-file-list-3-line fs-2 text-muted"></i><h3 class="h6 mt-2">No reports generated yet</h3><p class="text-muted mb-0">Choose a scope, reporting period, and format above to create your first value report.</p></div>
                    @endif
                </section>
            </div></main>
        </div>
    </div>
</div>
@include('client.include.footer')
