@include('admin.include.header')

 <style>


.modal-backdrop.fade.show{
    display:none !important;
}
.modal.fade.show {
    background: rgba(0, 0, 0, 0.4);
}
         .toast-container {

        position: fixed;

        top: 1rem;

        right: 1rem;

        z-index: 9999;

      }

    </style>
<div class="page-content">
    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Technicians Management</h4>
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
                                            <form action="{{ route('admin.technicians.index') }}" method="GET" class="d-flex align-items-center gap-1">
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
                                                  <a href="{{ route('admin.technicians.index') }}" class="btn btn-secondary gap-1 ">
                                                    <i class="ri-refresh-line"> </i> Reset
                                                </a>
                                            </form>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(session('success'))
                                <div class="mt-3 alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="mt-3 alert alert-danger">Please fix the errors in the form below.</div>
                            @endif
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
                                                <th class="sorting gridjs-th sorting_asc" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending">
                                                    Name
                                                </th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending">
                                                    Phone</th>
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending">
                                                    Company</th>

                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Start date: activate to sort column ascending">
                                                    Role</th>
                                               
                                                <th class="sorting gridjs-th" tabindex="0"
                                                    aria-controls="basic-datatable" rowspan="1" colspan="1"
                                                    aria-label="Salary: activate to sort column ascending">
                                                    Email</th>
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
                                        @php 
                                        $index = 1;
                                        @endphp
                                        <tbody id="technicians-tbody">
                                            {{-- Rows will be rendered by JS for AJAX flows; include initial server rendering for SEO/JS-off fallback --}}
                                            @if(isset($technicians) && $technicians->count())
                                                @foreach($technicians as $technician)
                                                    <tr data-technician-id="{{ $technician->id }}">
                                                        <td>{{ $index++ }}</td>
                                                        <td>{{ $technician->name }}</td>
                                                        <td>{{ $technician->phone }}</td>
                                                        <td>{{ $technician->company_name }}</td>
                                                        <td>{{ $technician->roleName() }}</td>
                                                        
                                                        <td>{{ $technician->email }}</td>
                                                        <td>{{ $technician->statusName() }}</td>
                                                       
                                                        <td>
                                                            <div class="d-flex align-items-center justify-content-center gap-1">
                                                                <button data-bs-toggle="modal" data-bs-target="#viewtechnicianModal-{{ $technician->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-view" data-id="{{ $technician->id }}"><i class="ri-eye-line"></i></button>
                                                                <button data-bs-toggle="modal" data-bs-target="#edittechnicianModal-{{ $technician->id }}" class="btn btn-default btn-icon btn-sm btn-outline-dark btn-edit" data-id="{{ $technician->id }}"><i class="ri-pencil-line"></i></button>
                                                              
                                                                <button class="btn btn-default btn-icon btn-sm btn-outline-dark btn-delete" 
                                                                        data-id="{{ $technician->id }}" 
                                                                        data-route="{{ route('admin.technicians.destroy', $technician->id) }}">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    {{-- Edit Modal per technician --}}
                                                    <div class="modal fade" id="edittechnicianModal-{{ $technician->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">Edit technician</h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @include('admin.partials.technician-edit', ['technician' => $technician])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- View Modal per technician --}}
                                                    <div class="modal fade" id="viewtechnicianModal-{{ $technician->id }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title">technician #{{ $technician->id }}</h3>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @include('admin.partials.technician-view', ['technician' => $technician])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">No technicians found.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                      <div class="d-flex justify-content-center mt-3">
    {{ $technicians->links('pagination::bootstrap-5') }}
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

{{-- Create technician Modal --}}
<div class="modal fade" id="createtechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create technician</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createtechnicianForm" action="{{ route('admin.technicians.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            <div class="invalid-feedback d-block name-error"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                            <div class="invalid-feedback d-block email-error"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            <div class="invalid-feedback d-block phone-error"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="company_name" class="form-label">Company</label>
                            <input type="text" name="company_name" class="form-control" id="company_name" value="{{ old('company_name') }}">
                            <div class="invalid-feedback d-block company_name-error"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <div class="invalid-feedback d-block status-error"></div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div class="invalid-feedback d-block password-error"></div>
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

{{-- Generic technician view modal will be loaded via show route (redirect to page or AJAX). For now keep server-side route to a page/modal partial --}}
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Application</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form action="#">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="applicationNo" class="form-label">Application No</label>
                                <input type="text" class="form-control" id="applicationNo"
                                    placeholder="Enter Application No" value="NP/1020/2025">
                            </div>
                            <div class="col-md-6">
                                <label for="consumerNo" class="form-label">Consumer No</label>
                                <input type="text" class="form-control" id="consumerNo"
                                    placeholder="Enter Consumer No" value="443346567568">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="circle" class="form-label">Circle</label>
                                <input type="text" class="form-control" id="circle" placeholder="Enter Circle"
                                    value="CREST">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="division" class="form-label">Division</label>
                                <input type="text" class="form-control" id="division" placeholder="Enter Division"
                                    value="Division 4">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="subDivision" class="form-label">Sub Division</label>
                                <input type="text" class="form-control" id="subDivision"
                                    placeholder="Enter Sub Division" value="Sub Division Office 4">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@include('admin.include.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ================= CREATE TECHNICIAN ================= */
    const createForm = document.getElementById('createtechnicianForm');

    if (createForm) {
        createForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors(createForm);

            fetch(createForm.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(createForm)
            })
            .then(r => r.json().then(j => ({ status: r.status, body: j })))
            .then(res => {
                if (res.status === 201) {
                    bootstrap.Modal.getInstance(
                        document.getElementById('createtechnicianModal')
                    ).hide();

                    Swal.fire('Success', 'Technician created successfully!', 'success')
                        .then(() => location.reload());
                }

                if (res.status === 422) {
                    showValidationErrors(createForm, res.body.errors);
                }
            });
        });
    }

    /* ================= TABLE BUTTON ACTIONS ================= */
    document.getElementById('technicians-tbody').addEventListener('click', function (e) {
        const btn = e.target.closest('button');
        if (!btn) return;

        const id = btn.dataset.id;

        // DELETE
        if (btn.classList.contains('btn-delete')) {
            confirmDelete(btn.dataset.route);
        }

        // EDIT
        if (btn.classList.contains('btn-edit')) {
            new bootstrap.Modal(
                document.getElementById('edittechnicianModal-' + id)
            ).show();
        }

        // VIEW
        if (btn.classList.contains('btn-view')) {
            new bootstrap.Modal(
                document.getElementById('viewtechnicianModal-' + id)
            ).show();
        }
    });

    /* ================= EDIT TECHNICIAN ================= */
    document.getElementById('technicians-tbody').addEventListener('submit', function (e) {
        const form = e.target.closest('.technician-edit-form');
        if (!form) return;

        e.preventDefault();
        clearErrors(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: new FormData(form)
        })
        .then(r => r.json().then(j => ({ status: r.status, body: j })))
        .then(res => {
            if (res.status === 200) {
                bootstrap.Modal.getInstance(
                    form.closest('.modal')
                ).hide();

                Swal.fire('Updated!', 'Technician updated successfully!', 'success')
                    .then(() => location.reload());
            }

            if (res.status === 422) {
                showValidationErrors(form, res.body.errors);
            }
        });
    });

});

/* ================= HELPERS ================= */
function clearErrors(form) {
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    form.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');
}

function showValidationErrors(form, errors) {
    Object.keys(errors).forEach(field => {
        const input = form.querySelector(`[name="${field}"]`);
        const error = form.querySelector(`.${field}-error`);
        if (input) input.classList.add('is-invalid');
        if (error) error.innerHTML = errors[field][0];
    });
}

function confirmDelete(route) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(result => {
        if (result.isConfirmed) {
            fetch(route, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(() => {
                Swal.fire('Deleted!', 'Technician removed', 'success')
                    .then(() => location.reload());
            });
        }
    });
}
</script>
<script>
document.addEventListener('hidden.bs.modal', function () {
    document.body.classList.remove('modal-open');

    // Remove leftover backdrops
    document.querySelectorAll('.modal-backdrop').forEach(function (el) {
        el.remove();
    });

    // Reset body scroll
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
});
</script>
