@include('admin.include.header')

<div class="page-content">


    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Purchase Plan</h4>
        </div>
    </div>
    <div class="page-container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row py-2">
                                
                                <div class="col-sm-12 col-md-12 d-flex justify-content-end">
                                    <div class="gridjs-head">
                                        <div class="gridjs-search d-flex align-items-center gap-1">
                                              <form action="{{ route('admin.subscription.index') }}" method="GET" class="d-flex align-items-center gap-1">
    <input 
        type="search" 
        name="keyword" 
        placeholder="Type a keyword..."
        value="{{ request('keyword') }}" 
        aria-label="Type a keyword..."
        class="gridjs-input gridjs-search-input"
    >
    <button type="submit" class="btn btn-primary">
        <i class="ri-search-line"></i> Search
    </button>
      <a href="{{ route('admin.subscription.index') }}" class="btn btn-secondary gap-1 ">
        <i class="ri-refresh-line"> </i> Reset
    </a>
</form>
                                            <!-- <button data-bs-toggle="modal" data-bs-target="#exampleModalEdit"
                                                class="btn btn-sm btn-primary d-flex gap-1 createBtn"><i
                                                    class="ri-add-circle-fill"></i> Create</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="deviceTable"
                                        class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                        aria-describedby="basic-datatable_info"
                                        style="position: relative; width: 1186px;">
                                        <thead>
                                            <tr>
                                                <th class="sorting gridjs-th sorting_asc" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    S No
                                                </th>
                                                
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    User Name</th>

                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Site Name</th>

                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Start date: activate to sort column ascending">
                                                    Plan Name</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Amount</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Start Date</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    End Date</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Status</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Days Left</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>@php 
                                        $i = 1;
                                        
                                        @endphp
                                             @foreach($subscriptions as $index => $subscription)
                                                <tr class="odd">
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $subscription->user->name ?? '-' }}</td>
                                                    <td>{{ $subscription->site->name ?? '-' }}</td>
                                                    <td>{{ $subscription->plan->name ?? '-' }}</td>
                                                    <td>${{ number_format($subscription->amount, 2) }}</td>
                                                  <td>
                                                        {{ $subscription->start_date ? \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') : '-' }}
                                                    </td>
                                                    <td>
                                                        {{ $subscription->end_date ? \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') : '-' }}
                                                    </td>
                                                    <td>
                                                        @if($subscription->status == 'succeeded')
                                                            <label class="badge bg-success px-2 py-2 fs-5">
                                                                
                                                                <i class="ri-checkbox-circle-line"></i>
                                                                Succeeded
                                                            </label>
                                                        @elseif($subscription->status == 'pending')
                                                            <span class="badge bg-warning px-2 py-2 fs-5">
                                                                <i class="ri-time-line"></i> Pending
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger px-2 py-2 fs-5">
                                                                <i class="ri-close-circle-line"></i> Failed
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($subscription->end_date)
                                                            {{ \Carbon\Carbon::now()->diffInDays($subscription->end_date, false) > 0 
                                                                ? \Carbon\Carbon::now()->diffInDays($subscription->end_date) . ' days'
                                                                : 'Expired' }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="7" class="hiddenRow">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">
    {{ $subscriptions->links('pagination::bootstrap-5') }}
</div>
                                </div>
                            </div>
                             
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div>
</div>
</div>

@include('admin.include.footer')

<script>
document.getElementById('deviceSearch').addEventListener('keyup', function () {
    let keyword = this.value.toLowerCase().trim();
    let rows = document.querySelectorAll('#deviceTable tbody tr');

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(keyword) ? '' : 'none';
    });
});
</script>