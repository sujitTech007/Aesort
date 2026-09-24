@include('admin.include.header')



        <div class="page-content">


            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0 py-2">Sites Management</h4>
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
                                                  <form action="{{ route('admin.sites.index') }}" method="GET" class="d-flex align-items-center gap-1">
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
      <a href="{{ route('admin.sites.index') }}" class="btn btn-secondary gap-1 ">
        <i class="ri-refresh-line"> </i> Reset
    </a>
</form>
                                                    
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
                                                            aria-label="Position: activate to sort column ascending">
                                                           Client Name</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending">
                                                            Name</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">
                                                            address</th>

                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending">
                                                            Area Sqft</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                         Type</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Status</th>
                                                        <th class="sorting gridjs-th" tabindex="0"
                                                            aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending">
                                                            Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>

                                               @php
$i = ($sites->currentPage() - 1) * $sites->perPage() + 1;
@endphp
                                                 @if(isset($sites) && $sites->count())
                                                @foreach ($sites as $site)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $i++ }}</td>
                                                        <td>{{ $site->user->name }}</td>
                                                        <td>{{ $site->name }}</td>
                                                        <td>{{ $site->address }}</td>
                                                        <td>{{ $site->area_sqft }}</td>
                                                        <td>{{ $site->type }}</td>
                                                        <td>
                                                            @if($site->status == 1)
                                                            Active
                                                            @else
                                                            Inactive
                                                            @endif
                                                        
                                                        </td>
                                                        <td>
                                                             <div class="d-flex align-items-center justify-content-center gap-1">
                                                                <button data-bs-toggle="modal" data-bs-target="#viewSiteModal-{{ $site->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-view" data-id="{{ $site->id }}"><i class="ri-eye-line"></i></button>
                                                                <button data-bs-toggle="modal" data-bs-target="#editSiteModal-{{ $site->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-edit" data-id="{{ $site->id }}"><i class="ri-pencil-line"></i></button>
                                                                <!-- <button class="btn btn-default btn-icon btn-sm btn-outline-dark btn-delete" data-id="{{ $site->id }}"><i class="ri-delete-bin-line"></i></button> -->
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- Edit Modal per site --}}
                                                    <div class="modal fade" id="editSiteModal-{{ $site->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Edit Site</h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @include('admin.partials.site-edit', ['site' => $site])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- View Modal per site --}}
                                                    <div class="modal fade" id="viewSiteModal-{{ $site->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Site #{{ $site->id }}</h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @include('admin.partials.site-view', ['site' => $site])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @endforeach
                                                     @else
                                                <tr>
                                                    <td colspan="7" class="text-center">No clients found.</td>
                                                </tr>
                                            @endif
                                                </tbody>
                                            </table>
<div class="d-flex justify-content-center mt-3">
    {{ $sites->links('pagination::bootstrap-5') }}
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
    <!-- END wrapper -->


    <div class="modal fade" id="exampleModalView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Application Number NP/2010/2025</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modalListViwe-box">

                        <div class="tableStatusList mb-1">
                            <div class="row justify-content-between px-3">
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Discom:</h5>
                                    <p>Chandigarh Electricity dipartiment</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Application No:</h5>
                                    <p>NP/1020/2025</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>State:</h5>
                                    <p>Chandigarh</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Circle:</h5>
                                    <p>CREST</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Subsidy Amount(in Rs):</h5>
                                    <p>54,000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Distric:</h5>
                                    <p>Chandigarh</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Division:</h5>
                                    <p>Division 4</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Existing Installed Capacity(kwp):</h5>
                                    <p>0.000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Pincode:</h5>
                                    <p>160030</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Subdivision:</h5>
                                    <p>Sub Division office 4</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Proposed Capacity(kwp):</h5>
                                    <p>3.000</p>
                                </div>
                                <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                                    <h5>Approved Capacity(kwp):</h5>
                                    <p>3.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Create Site Modal --}}
<div class="modal fade" id="createSiteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create Site</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="createSiteForm" action="{{ route('admin.sites.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">

                        <!-- User ID -->
                        <div class="col-md-6">
                            <label for="user_id" class="form-label">Select User</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback d-block user_id-error"></div>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback d-block name-error"></div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mt-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                            <div class="invalid-feedback d-block address-error"></div>
                        </div>

                        <!-- City -->
                        <div class="col-md-6 mt-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}" required>
                            <div class="invalid-feedback d-block city-error"></div>
                        </div>

                        <!-- Country -->
                        <div class="col-md-6 mt-2">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" required>
                            <div class="invalid-feedback d-block country-error"></div>
                        </div>

                        <!-- Area (sqft) -->
                        <div class="col-md-6 mt-2">
                            <label for="area_sqft" class="form-label">Area (sqft)</label>
                            <input type="number" name="area_sqft" class="form-control" id="area_sqft" value="{{ old('area_sqft') }}" required>
                            <div class="invalid-feedback d-block area_sqft-error"></div>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6 mt-2">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-select" id="type" required>
                                <option value="">Select Type</option>
                                <option value="office" {{ old('type') == 'office' ? 'selected' : '' }}>Office</option>
                                <option value="hotel" {{ old('type') == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                <option value="retail" {{ old('type') == 'retail' ? 'selected' : '' }}>Retail</option>
                                <option value="hospital" {{ old('type') == 'hospital' ? 'selected' : '' }}>Hospital</option>
                                <option value="school" {{ old('type') == 'school' ? 'selected' : '' }}>School</option>
                                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            <div class="invalid-feedback d-block type-error"></div>
                        </div>

                        <!-- Timezone -->
                        <div class="col-md-6 mt-2">
                            <label for="timezone" class="form-label">Timezone</label>
                            <input type="text" name="timezone" class="form-control" id="timezone" value="{{ old('timezone') }}" required>
                            <div class="invalid-feedback d-block timezone-error"></div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" id="status">
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                    </div>

                    <div class="modal-footer mt-4 border-0 d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
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

<script>
    // Helper to build a table row HTML for a client
    function siteRowHtml(site) {
        return `
            <tr data-site-id="${site.id}">
                <td>${site.id}</td>
                <td>${site.user_id || ''}</td>
                <td>${site.name || ''}</td>
                <td>${site.address || ''}</td>
                <td>${site.city || ''}</td>
                <td>${site.country || ''}</td>
                <td>${site.area_sqft || ''}</td>
                <td>${site.type || ''}</td>
                <td>${site.timezone || ''}</td>
                <td>${site.status == 1 ? 'Active' : 'Inactive'}</td>
                <td>
                    <div class="d-flex align-items-center justify-content-center gap-1">
                        <button data-id="${site.id}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-view"><i class="ri-eye-line"></i></button>
                        <button data-id="${site.id}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-edit"><i class="ri-pencil-line"></i></button>
                        <button data-id="${site.id}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-delete"><i class="ri-delete-bin-line"></i></button>
                    </div>
                </td>
            </tr>
        `;
    }

    // Initial sites from server (for JS rendering if we want to rebuild)
    var initialsites = @json(isset($sites) ? $sites->items() : []);

    // Attach global handlers once DOM is ready
    document.addEventListener('DOMContentLoaded', function () {
    var createForm = document.querySelector('#createSiteForm');

    if (!createForm) return;

    createForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Clear previous errors
        createForm.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
        createForm.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');

        var formData = new FormData(createForm);

        fetch(createForm.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            let data = {};
            try {
                data = await response.json();
            } catch (err) {
                console.error('Failed to parse JSON', err);
            }
            return { status: response.status, body: data };
        })
        .then(obj => {
            if (obj.status === 201) {
                // Success
                var tbody = document.getElementById('sites-tbody');
                tbody.insertAdjacentHTML('afterbegin', siteRowHtml(obj.body.site));

                var modalEl = document.getElementById('createSiteModal');
                var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.hide();

                createForm.reset();
                showToast('Site created successfully!', 'success');

            } else if (obj.status === 422) {
                // Validation errors
                let errors = obj.body.errors || {};
                for (let field in errors) {
                    let errorElement = createForm.querySelector('.' + field + '-error');
                    let inputElement = createForm.querySelector('[name="' + field + '"]');
                    if (errorElement) errorElement.innerHTML = errors[field][0];
                    if (inputElement) inputElement.classList.add('is-invalid');
                }
            } else {
                console.log('Unexpected response:', obj);
                showToast('Unexpected response', 'error');
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
            showToast('Error creating site', 'error');
        });
    });
});
        // Delegate edit/delete/view button clicks
        document.getElementById('sites-tbody').addEventListener('click', function (e) {
            var target = e.target.closest('button');
            if (!target) return;
            var id = target.getAttribute('data-id');
            if (target.classList.contains('btn-delete')) {
                if (!confirm('Delete this site?')) return;
                fetch(`/admin/sites/${id}`, { method: 'DELETE', headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') } })
                    .then(r => r.json()).then(j => {
                        // remove row
                        var row = document.querySelector('[data-site-id="' + id + '"]');
                        if (row) row.remove();
                        showToast('Site deleted successfully!', 'success');
                    }).catch(err => { console.error(err); showToast('Delete failed', 'error'); });
                return;
            }

            if (target.classList.contains('btn-edit')) {
                // open modal for edit (existing DOM modal)
                var modalEl = document.getElementById('editsiteModal-' + id);
                if (modalEl) {
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
                return;
            }

            if (target.classList.contains('btn-view')) {
                var modalEl = document.getElementById('viewsiteModal-' + id);
                if (modalEl) {
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
                return;
            }
        });

        // Intercept edit form submissions (delegated)
        document.getElementById('sites-tbody').addEventListener('submit', function (e) {
            var form = e.target.closest('.site-edit-form');
            if (!form) return;
            e.preventDefault();
            
            // Clear previous errors
            form.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');
            
            var id = form.getAttribute('data-site-id');
            var action = form.action;
            var fd = new FormData(form);
            fetch(action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: fd
            }).then(r => r.json().then(j => ({status: r.status, body: j}))).then(obj => {
                if (obj.status === 200) {
                    // update row
                    var row = document.querySelector('[data-site-id="' + id + '"]');
                    if (row) {
                        row.outerHTML = siteRowHtml(obj.body.site);
                    }
                    var modalEl = document.getElementById('editsiteModal-' + id);
                    var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modal.hide();
                    showToast('Site updated successfully!', 'success');
                } else if (obj.status === 422) {
                    // show per field errors inside modal
                    var errors = obj.body.errors;
                    Object.keys(errors).forEach(function (field) {
                        var el = form.querySelector('[name="' + field + '"]');
                        if (el) {
                            el.classList.add('is-invalid');
                            var errEl = form.querySelector('.' + field + '-error');
                            if (errEl) errEl.textContent = errors[field][0];
                        }
                    });
                } else {
                    showToast('Unexpected response', 'error');
                }
            }).catch(err => { console.error(err); showToast('Error updating site', 'error'); });
        });
    });
</script>