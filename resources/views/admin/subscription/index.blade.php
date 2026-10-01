@include('admin.include.header')


<div class="page-content">


    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Subscription</h4>
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
                                        <div class="gridjs-search d-flex align-items-end gap-1">
                                            
                                            <a href="{{ route('admin.subscription_plans.create') }}" class="btn btn-sm btn-primary d-flex gap-1 createBtn">
                                                <i class="ri-add-circle-fill"></i> Create</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
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
                                                    aria-label="Position: activate to sort column ascending">
                                                    Name
                                                </th>
                                                <th class="gridjs-th">Pricing approval</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Proposed amount (USD)
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Minimum area (sq ft)
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Maximum area (sq ft)
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Start date: activate to sort column ascending">
                                                    Features
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        @php
                                        $i = 1;
                                        @endphp

                                        <tbody>
                                            @foreach($plans as $plan)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $i++ }}</td>
                                                <td>{{ @$plan->name }}</td>
                                                <td>
                                                    @if($plan->pricing_status === 'approved')
                                                        <span class="badge bg-success">Approved</span>
                                                        <div class="small text-muted">{{ $plan->pricing_approved_at?->format('M d, Y') }}</div>
                                                    @else
                                                        <span class="badge bg-warning-subtle text-warning">Draft / unapproved</span>
                                                    @endif
                                                </td>
                                                <td>{{ $plan->currency_code ?? 'USD' }} {{ number_format((float) $plan->amount, 2) }}</td>
                                                <td>{{ @$plan->from_sqft }}</td>
                                                <td>{{ @$plan->to_sqft }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($plan->features as $feature)
                                                        <li>{{ \Illuminate\Support\Str::limit($feature, 70) }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                                    <a href="{{ route('admin.subscription_plans.edit', @$plan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    @if($plan->pricing_status !== 'approved')
                                                        @if((int) $plan->created_by !== (int) Auth::guard('admin')->id() || \App\Models\Admin::count() === 1)
                                                            <form action="{{ route('admin.subscription_plans.approve-pricing', $plan->id) }}" method="POST">
                                                                @csrf
                                                                <!-- <label class="form-label small" for="approval-reason-{{ $plan->id }}">{{ (int) $plan->created_by === (int) Auth::guard('admin')->id() ? 'Single-admin exception reason' : 'Approval reason' }}</label> -->
                                                                <!-- <input id="approval-reason-{{ $plan->id }}" type="text" name="approval_reason" class="form-control form-control-sm mb-1" minlength="8" required> -->
                                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                                            </form>
                                                            @if((int) $plan->created_by === (int) Auth::guard('admin')->id())
                                                                <!-- <div class="small text-warning mt-1">Only one admin exists; this approval is audited as a single-admin exception.</div> -->
                                                            @endif
                                                        @else
                                                            <!-- <div class="small text-muted mt-2">Requires approval by another administrator.</div> -->
                                                        @endif
                                                    @endif
                                                    <form action="{{ route('admin.subscription_plans.destroy', @$plan->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Archive this plan? Existing subscription history will be retained.')">Archive</button>
                                                    </form>
                                                    </div>
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
                             
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
</div>
</div>


@include('admin.include.footer')