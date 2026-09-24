@include('client.include.header')

<div class="page-content">
    <div class="container">

        <!-- Main Row -->
        <div class="row d-flex justify-content-between">
            <div class="col-md-3">
                @include('client/include.sidebar-nav') 
            </div>
           <div class="col-md-9">
                 <div class="page-content-col">


                    <div class="page-title-head d-flex align-items-center gap-2">

                        <div class="flex-grow-1">

                            <h4 class="fs-18 fw-bold mb-0 py-2">Billing / Subscription</h4>

                        </div>

                    </div>

                    <div class="page-container p-0 mt-4">



                                <div class="card">

                                    <div class="card-body">

                                        <h4 class="header-title">Basic Data Table</h4>

                                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                            <div class="row py-2">

                                                <div class="col-sm-12 col-md-6">

                                                    <div class="dataTables_length" id="basic-datatable_length"><label

                                                            class="form-label d-flex align-items-center">Show <select

                                                                name="basic-datatable_length" aria-controls="basic-datatable"

                                                                class="form-select w-auto">

                                                                <option value="10">10</option>

                                                                <option value="25">25</option>

                                                                <option value="50">50</option>

                                                                <option value="100">100</option>

                                                            </select> Entries</label></div>

                                                </div>

                                                <div class="col-sm-12 col-md-6 d-flex justify-content-end">

                                                    <div class="gridjs-head">

                                                        <div class="gridjs-search d-flex align-items-center gap-1">

                                                            <input type="search" placeholder="Type a keyword..."

                                                                aria-label="Type a keyword..."

                                                                class="gridjs-input gridjs-search-input" value="">

                                                            

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-12">

                                                    <table id="basic-datatable"

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

                                                        <tbody>

                                                            @foreach($subscriptions as $index => $subscription)

                                                                <tr class="odd">

                                                                    <td>{{ $index + 1 }}</td>

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

                                                </div>

                                            </div>

                                            

                                        </div>

                                    </div> <!-- end card body-->

                                </div> <!-- end card -->

                            

                        </div> <!-- end row-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('client.include.footer')