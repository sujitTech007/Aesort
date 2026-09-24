@include('admin.include.header')


<div class="page-content">


    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Services</h4>
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
                                             <form action="{{ route('admin.services.index') }}" method="GET" class="d-flex align-items-center gap-1">
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
                                                  <a href="{{ route('admin.services.index') }}" class="btn btn-secondary gap-1 ">
                                                    <i class="ri-refresh-line"> </i> Reset
                                                </a>
                                            </form>
                                            <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary d-flex gap-1 createBtn">
                                                <i class="ri-add-circle-fill"></i> Create</a>
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
                                                    Image
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending">
                                                    Title
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Short Description
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
                                            @foreach($services as $service)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $i++ }}</td>
                                                <td>
                                                  <img src="{{ asset('uploads/service-images/' . $service->banner_image) }}" alt="" style="width: 100px; height: 70px; object-fit: cover; border-radius: 5px;">  
                                                </td>
                                                <td>{{ @$service->title }}</td>
                                                <td>{{ Str::limit(@$service->short_description, 50) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.services.edit', @$service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('admin.services.destroy', @$service->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">Delete</button>
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
                                    <div class="d-flex justify-content-center mt-3">
                                        {{ $services->links('pagination::bootstrap-5') }}
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