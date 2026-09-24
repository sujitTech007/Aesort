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

                            <h4 class="fs-18 fw-bold mb-0 py-2">Devices & Sensors</h4>

                        </div>

                    </div>



                    <div class="page-container p-0 mt-4">



                                <div class="card">
                                     <div class="card-header d-flex justify-content-between align-items-center">
                                        <h4 class="header-title mb-3">Devices List</h4>

                                        <div class="gridjs-head">

                                                        <div class="gridjs-search d-flex align-items-end gap-1">

                                                            <form action="{{ route('client.devices') }}" method="GET" class="d-flex align-items-center gap-1">

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

                                                                <a href="{{ route('client.devices') }}" class="btn btn-secondary gap-1 ">

                                                                    <i class="ri-refresh-line"> </i> Reset

                                                                </a>

                                                            </form>

                                                        </div>

                                                    </div>
                                    </div>

                                    <div class="card-body">

                                       
                                       

                                        <table class="table table-bordered" id="devicesTable">

                                            <thead>

                                                <tr>

                                                    <th>S No.</th>

                                                    <th>Serial Number</th>

                                                    <th>Name</th>

                                                    <th>Type</th>

                                                    <th>Firmware Version</th>

                                                    <th>Last Active</th>

                                                    <th>Status</th>

                                                    <th>Installed At</th>

                                                    <!-- <th>Action</th> -->

                                                </tr>

                                            </thead>

                                            @php 

                                            $i =1;

                                            @endphp

                                            <tbody>

                                                @foreach($devices as $device)

                                                <tr id="deviceRow{{ $device->id }}">

                                                    <td>{{ $i++ }}</td>

                                                    <td>{{ $device->serial_number }}</td>

                                                    <td>{{ $device->name }}</td>

                                                    <td>{{ $device->type }}</td>

                                                    <td>{{ $device->firmware_version }}</td>

                                                    <td>{{ \Carbon\Carbon::parse($device->last_active)->format('d M Y | h:i A') }}</td>

                                                    

                                                    <td>{{ $device->status }}</td>

                                                

                                                    <td>{{ \Carbon\Carbon::parse($device->installed_at)->format('d M Y | h:i A') }}</td>

                                                    <!-- <td class="d-flex gap-1">

                                                        <button data-bs-toggle="modal" data-bs-target="#viewDeviceModal-{{ $device->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-view" data-id="{{ $device->id }}"><i class="ri-eye-line"></i></button>

                                                        <button data-bs-toggle="modal" data-bs-target="#editDeviceModal-{{ $device->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-edit" data-id="{{ $device->id }}"><i class="ri-pencil-line"></i></button> -->



                                                        <!-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"  -->

                                                        <!-- data-id="{{ $device->id }}"><i class="ri-eye-line"></i></button> -->



                                                        <!-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 

                                                            data-id="{{ $device->id }}"><i class="ri-pencil-line"></i></button> -->



                                                        <!-- <button type="button" class="btn btn-danger btn-sm deleteBtn" data-id="{{ $device->id }}"><i class="ri-delete-bin-line"></i></button> -->

                                                    <!-- </td> -->

                                                </tr>

                                                @endforeach

                                            </tbody>

                                        </table>



                                            

                                    </div>

                                </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@include('client.include.footer')