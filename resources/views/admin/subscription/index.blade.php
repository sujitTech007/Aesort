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
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Amount
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    From SQFT
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    To SQFT
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
                                                <td>{{ @$plan->amount }}</td>
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
                                                    <a href="{{ route('admin.subscription_plans.edit', @$plan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('admin.subscription_plans.destroy', @$plan->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this plan?')">Delete</button>
                                                    </form>
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
            </div><!-- end col-->
        </div>
    </div>
</div>
</div>


@include('admin.include.footer')