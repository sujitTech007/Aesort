@include('admin.include.header')



<div class="page-content">

    <div class="page-title-head d-flex align-items-center gap-2">

        <div class="flex-grow-1">

            <h4 class="fs-18 fw-bold mb-0 py-2">Devices & Sensors</h4>

        </div>

    </div>



    <div class="page-container">

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body">
 

                        <div class="mb-3 d-flex justify-content-end gap-1">

                            <form action="{{ route('admin.devices.index') }}" method="GET" class="d-flex align-items-center gap-1">

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

      <a href="{{ route('admin.devices.index') }}" class="btn btn-secondary gap-1 ">

        <i class="ri-refresh-line"> </i> Reset

    </a>

</form>

                            

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">

                                <i class="ri-add-circle-fill"></i> Create

                            </button>

                        </div>



                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th>Site Name</th>

                                    <th>Serial Number</th>

                                    <th>Name</th>

                                    <th>Type</th>

                                    <th>Firmware Version</th>

                                    <th>Last Active</th>

                                    <th>Status</th>

                                    <th>Installed At</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody id>

                                

                                @foreach($devices as $device)

                                <tr>

                                    <td>

                                        @php 

                                        $siteName = App\Models\Site::where('id', $device->site_id)->first();

                                        @endphp

                                        {{ $siteName->name }}</td>

                                    <td>{{ $device->serial_number }}</td>

                                    <td>{{ $device->name }}</td>

                                    <td>{{ $device->type }}</td>

                                    <td>{{ $device->firmware_version }}</td>

                                   <td>{{ \Carbon\Carbon::parse($device->last_active)->format('d M Y | h:i A') }}</td>

                                    <td>{{ $device->status }}</td>

                                    <td>{{ \Carbon\Carbon::parse($device->installed_at)->format('d M Y | h:i A') }}</td>

                                    <td class="d-flex gap-1">

                                        <button data-bs-toggle="modal" data-bs-target="#viewDeviceModal-{{ $device->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-view" data-id="{{ $device->id }}"><i class="ri-eye-line"></i></button>

                                        <button data-bs-toggle="modal" data-bs-target="#editDeviceModal-{{ $device->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-edit" data-id="{{ $device->id }}"><i class="ri-pencil-line"></i></button>

                                        <div class="modal fade" id="viewDeviceModal-{{ $device->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">View Device</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                    </div>

                                                    <div class="modal-body">
                                                        @include('admin.partials.device-view', ['device' => $device])

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit Modal per device --}}

                                        <div class="modal fade" id="editDeviceModal-{{ $device->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Edit Device</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('admin.partials.device-edit', ['device' => $device, 'sites' => $sites])
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <!-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal"  -->

                                        <!-- data-id="{{ $device->id }}"><i class="ri-eye-line"></i></button> -->



                                        <!-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 

                                            data-id="{{ $device->id }}"><i class="ri-pencil-line"></i></button> -->



                                        <!-- <button type="button" class="btn btn-danger btn-sm deleteBtn" data-id="{{ $device->id }}"><i class="ri-delete-bin-line"></i></button> -->

                                    </td>

                                </tr>

                             
                             
                       

                                @endforeach

                            </tbody>

                        </table>

                        <div class="d-flex justify-content-center mt-3">

                              {{ $devices->links('pagination::bootstrap-5') }}

                        </div>



                        

                    </div>

                </div>

            </div>

        </div>

    </div>

</div> 



<!-- CREATE MODAL -->

<div class="modal fade" id="createModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Create Device</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <form id="createDeviceForm">

                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">

                            <label for="user_id" class="form-label">Select User</label>

                            <select name="user_id" class="form-select" id="userSelect" required>

                                <option value="">-- Select User --</option>

                                @foreach($clients as $client)

                                    <option value="{{ $client->id }}">{{ $client->name }}</option>

                                @endforeach

                            </select>

                            <div class="invalid-feedback d-block user_id-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="site_id" class="form-label">Select Site</label>

                            <select name="site_id" class="form-select" id="siteSelect" required>

                                <option value="">-- Select Site --</option>

                            </select>

                            <div class="invalid-feedback d-block site_id-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="serial_number" class="form-label">Serial Number</label>

                            <input type="text" name="serial_number" class="form-control" placeholder="Serial Number" required>

                            <div class="invalid-feedback d-block serial_number-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="name" class="form-label">Name</label>

                            <input type="text" name="name" class="form-control" placeholder="Name" required>

                            <div class="invalid-feedback d-block name-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="type" class="form-label">Type</label>

                            <select name="type" class="form-select" required>

                                <option value="sensor" selected>Sensor</option>

                                <option value="meter">Meter</option>

                                <option value="gateway">Gateway</option>

                            </select>

                            <div class="invalid-feedback d-block type-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="firmware_version" class="form-label">Firmware Version</label>

                            <input type="text" name="firmware_version" class="form-control" placeholder="Firmware Version">

                            <div class="invalid-feedback d-block firmware_version-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="last_active" class="form-label">Last Active</label>

                            <input type="datetime-local" name="last_active" class="form-control">

                            <div class="invalid-feedback d-block last_active-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="status" class="form-label">Status</label>

                            <select name="status" class="form-select" required>

                                <option value="online" selected>Online</option>

                                <option value="offline">Offline</option>

                            </select>

                            <div class="invalid-feedback d-block status-error"></div>

                        </div>

                        <div class="col-md-6">

                            <label for="installed_at" class="form-label">Installed At</label>

                            <input type="datetime-local" name="installed_at" class="form-control">

                            <div class="invalid-feedback d-block installed_at-error"></div>

                        </div>

                    </div>

                    <div class="mt-3 text-center align-items-center d-flex justify-content-start gap-2">

                        <button type="submit" class="btn btn-primary">Create</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>



<!-- VIEW MODAL -->

<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Device Details</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <p><strong>Site:</strong> <span id="viewSite"></span></p>

                <p><strong>Serial Number:</strong> <span id="viewSerial"></span></p>

                <p><strong>Name:</strong> <span id="viewName"></span></p>

                <p><strong>Type:</strong> <span id="viewType"></span></p>

                <p><strong>Firmware Version:</strong> <span id="viewFirmware"></span></p>

                <p><strong>Last Active:</strong> <span id="viewLastActive"></span></p>

                <p><strong>Status:</strong> <span id="viewStatus"></span></p>

                <p><strong>Installed At:</strong> <span id="viewInstalledAt"></span></p>

            </div>

        </div>

    </div>

</div>



<!-- EDIT MODAL -->

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Edit Device</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <form id="editDeviceForm">

                    @csrf

                    @method('PUT')

                    <input type="hidden" name="id" id="editDeviceId">



                    <div class="row g-3">

                        <div class="col-md-6">

                            <label class="form-label">Site</label>

                            <select name="site_id" id="editSiteId" class="form-select" required>

                                <option value="">-- Select Site --</option>

                                @foreach($sites as $site)

                                <option value="{{ $site->id }}">{{ $site->name }} ({{ $site->address }})</option>

                                @endforeach

                            </select>

                            <div class="invalid-feedback d-block site_id-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Serial Number</label>

                            <input type="text" name="serial_number" id="editSerialNumber" class="form-control" required>

                            <div class="invalid-feedback d-block serial_number-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Name</label>

                            <input type="text" name="name" id="editName" class="form-control" required>

                            <div class="invalid-feedback d-block name-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Type</label>

                            <select name="type" id="editType" class="form-select" required>

                                <option value="sensor">Sensor</option>

                                <option value="meter">Meter</option>

                                <option value="gateway">Gateway</option>

                            </select>

                            <div class="invalid-feedback d-block type-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Firmware Version</label>

                            <input type="text" name="firmware_version" id="editFirmwareVersion" class="form-control">

                            <div class="invalid-feedback d-block firmware_version-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Last Active</label>

                            <input type="datetime-local" name="last_active" id="editLastActive" class="form-control">

                            <div class="invalid-feedback d-block last_active-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Status</label>

                            <select name="status" id="editStatus" class="form-select" required>

                                <option value="online">Online</option>

                                <option value="offline">Offline</option>

                            </select>

                            <div class="invalid-feedback d-block status-error"></div>

                        </div>



                        <div class="col-md-6">

                            <label class="form-label">Installed At</label>

                            <input type="datetime-local" name="installed_at" id="editInstalledAt" class="form-control">

                            <div class="invalid-feedback d-block installed_at-error"></div>

                        </div>

                    </div>



                    <div class="mt-3 text-center">

                        <button type="submit" class="btn btn-primary">Update Device</button>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>



@include('admin.include.footer')



<script>

    $('#userSelect').on('change', function () {

    let userId = $(this).val();



    $('#siteSelect').html('<option value="">Loading...</option>');



    if (userId) {

        $.ajax({

            url: "{{ url('admin/get-sites') }}/" + userId,

            type: "GET",

            success: function (sites) {

                $('#siteSelect').html('<option value="">-- Select Site --</option>');

                $.each(sites, function (key, site) {

                    $('#siteSelect').append(

                        '<option value="' + site.id + '">' + site.name + '</option>'

                    );

                });

            },

            error: function () {

                $('#siteSelect').html('<option value="">No sites found</option>');

            }

        });

    } else {

        $('#siteSelect').html('<option value="">-- Select Site --</option>');

    }

});

</script>

<script>

    $(document).ready(function() {



        // CREATE DEVICE

        $('#createDeviceForm').submit(function(e) {

            e.preventDefault();

            

            // Clear previous errors

            $('#createDeviceForm .form-control, #createDeviceForm .form-select').removeClass('is-invalid');

            $('#createDeviceForm .invalid-feedback').html('');



            // Get form data

          let form = this;

    let formData = new FormData(form);



    // ✅ FIX: get values FROM THIS FORM ONLY

    let lastActive = $(form).find('input[name="last_active"]').val();

    if (lastActive) {

        formData.set('last_active', lastActive.replace('T', ' ') + ':00');

    }



    let installedAt = $(form).find('input[name="installed_at"]').val();

    if (installedAt) {

        formData.set('installed_at', installedAt.replace('T', ' ') + ':00');

    }





            $.ajax({

                url: "{{ route('admin.devices.store') }}",

                type: "POST",

                data: formData,

                processData: false,

                contentType: false,

                success: function(response) {

                    $('#createModal').modal('hide');

                    $('#createDeviceForm')[0].reset();

                    showToast(response.message, 'success');

                    setTimeout(() => location.reload(), 1000);

                },

                error: function(xhr) {

                    console.error(xhr.responseText);

                    if (xhr.status === 422) {

                        let errors = xhr.responseJSON.errors;

                        // Show errors below each input field

                        for (let field in errors) {

                            let errorElement = $('#createDeviceForm').find('.' + field + '-error');

                            let inputElement = $('#createDeviceForm').find('[name="' + field + '"]');

                            if (errorElement.length) {

                                errorElement.html(errors[field][0]);

                                inputElement.addClass('is-invalid');

                            }

                        }

                    } else {

                        showToast('Error: ' + (xhr.responseJSON?.message || 'Something went wrong!'), 'error');

                    }

                }

            });

        });

        // VIEW Modal

        var viewModalEl = document.getElementById('viewModal');

        viewModalEl.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget;

            var id = button.getAttribute('data-id');

            var devicesBaseUrl = "{{ url('/admin/devices/') }}";

            $.get(devicesBaseUrl + "/" + id, function(data) {

                $('#viewSite').text(data.site_name + " (" + data.site_address + ")");

                $('#viewSerial').text(data.serial_number);

                $('#viewName').text(data.name);

                $('#viewType').text(data.type);

                $('#viewFirmware').text(data.firmware_version);

                $('#viewLastActive').text(data.last_active);

                $('#viewStatus').text(data.status);

                $('#viewInstalledAt').text(data.installed_at);

            });

        });



        // EDIT Modal prefill

        var editModalEl = document.getElementById('editModal');

        editModalEl.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget;

            var id = button.getAttribute('data-id');



            $.get("/admin/devices/" + id, function(data) {

                $('#editDeviceId').val(data.id);

                $('#editSiteId').val(data.site_id);

                $('#editSerialNumber').val(data.serial_number);

                $('#editName').val(data.name);

                $('#editType').val(data.type);

                $('#editFirmwareVersion').val(data.firmware_version);

                $('#editLastActive').val(data.last_active);

                $('#editStatus').val(data.status);

                $('#editInstalledAt').val(data.installed_at);

            });

        });



        // Submit Edit via AJAX

        $('#editDeviceForm').submit(function(e) {

            e.preventDefault();

            

            // Clear previous errors

            $('#editDeviceForm .form-control, #editDeviceForm .form-select').removeClass('is-invalid');

            $('#editDeviceForm .invalid-feedback').html('');

            

            let id = $('#editDeviceId').val();

            

            // Convert datetime-local format (YYYY-MM-DDTHH:mm) to Laravel format (YYYY-MM-DD HH:mm)

            var lastActive = $('#editLastActive').val();

            var installedAt = $('#editInstalledAt').val();



            let formData = $(this).serializeArray();

            

            if (lastActive) {

                formData = formData.map(item => 

                    item.name === 'last_active' ? {name: 'last_active', value: lastActive.replace('T', ' ')} : item

                );

            }

            

            if (installedAt) {

                formData = formData.map(item => 

                    item.name === 'installed_at' ? {name: 'installed_at', value: installedAt.replace('T', ' ')} : item

                );

            }



            $.ajax({

                url: "{{ route('admin.devices.update', '') }}/" + id,

                type: 'PUT',

                data: $.param(formData),

                success: function(res) {

                    showToast(res.message || 'Device updated successfully!', 'success');

                    setTimeout(() => location.reload(), 1000);

                },

                error: function(err) {

                    console.error(err.responseText);

                    if (err.status === 422) {

                        let errors = err.responseJSON.errors;

                        // Show errors below each input field

                        for (let field in errors) {

                            let errorElement = $('#editDeviceForm').find('.' + field + '-error');

                            let inputElement = $('#editDeviceForm').find('[name="' + field + '"]');

                            if (errorElement.length) {

                                errorElement.html(errors[field][0]);

                                inputElement.addClass('is-invalid');

                            }

                        }

                    } else {

                        showToast('Error: ' + (err.responseJSON?.message || 'Check your inputs.'), 'error');

                    }

                }

            });

        });



        // DELETE DEVICE

        $('.deleteBtn').click(function() {

            if (!confirm('Are you sure you want to delete this device?')) return;

            let id = $(this).data('id');

            $.ajax({

                url: "/admin/devices/" + id,

                type: "DELETE",

                data: {

                    _token: '{{ csrf_token() }}'

                },

                success: function(response) {

                    $('#deviceRow' + id).remove();

                    showToast(response.message, 'success');

                }

            });

        });



    });

</script>