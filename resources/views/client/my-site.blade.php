@include('client.include.header')



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
                        <h4 class="header-title">Basic Data Table</h4>
                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row py-2">
                               
                                <div class="col-sm-12 col-md-12 d-flex justify-content-end">
                                    <div class="gridjs-head">
                                        <div class="gridjs-search d-flex align-items-end gap-1">
                                            
                                             <form action="{{ route('client.sites') }}" method="GET" class="d-flex align-items-center gap-1">
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
                                                  <a href="{{ route('client.sites') }}" class="btn btn-secondary gap-1 ">
                                                    <i class="ri-refresh-line"> </i> Reset
                                                </a>
                                            </form>

                                            
                                            <button data-bs-toggle="modal" data-bs-target="#createSiteModal"
                                                class="btn btn-sm btn-primary d-flex gap-1 createBtn"><i
                                                    class="ri-add-circle-fill"></i> Create</button>
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
                                            $i = 1;
                                            @endphp
                                            @if(isset($sites) && $sites->count())
                                            @foreach ($sites as $site)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $i++ }}</td>
                                                <td>{{ $site->name }}</td>
                                                <td>{{ $site->address }}</td>
                                                <td>{{ $site->area_sqft }}</td>
                                                <td>{{ $site->type }}</td>
                                                <td>{{ $site->status }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <button data-bs-toggle="modal" data-bs-target="#viewSiteModal-{{ $site->id }}" class="btn btn-view bg-info" data-id="{{ $site->id }}"><i class="ri-eye-line" title="View Info"></i></button>
                                                        <button data-bs-toggle="modal" data-bs-target="#editSiteModal-{{ $site->id }}" class="btn btn-edit bg-warning" data-id="{{ $site->id }}"><i class="ri-pencil-line" title="Edit"></i></button>
                                                        <!-- <button class="btn btn-delete" data-id="{{ $site->id }}"><i class="ri-delete-bin-line"></i></button> -->
                                                        <!-- <button class="btn bg-success" id="payButton" data-amount="500"><i class="ri-wallet-line" title="Pay"></i> Pay</button> -->
                                                        @php
                                                      
                                                        // Make sure area is numeric
                                                            $area = (int) $site->area_sqft;
                                                        
                                                            // Get subscription plan based on area
                                                            $subscription = App\Models\SubscriptionPlan::where('from_sqft', '<=', $area)
                                                                ->where(function ($q) use ($area) {
                                                                    $q->where('to_sqft', '>=', $area)
                                                                      ->orWhereNull('to_sqft'); // covers open-ended ranges
                                                                })
                                                                ->first();
                                                            
                                                         $subscriptionPayment = App\Models\Subscription::where('site_id', $site->id)->first();

                                                            @endphp
                                                            @if($subscription)
                                                            
                                                            <form method="POST" action="{{ route('stripe.checkout') }}">
                                                                @csrf
                                                                <input type="hidden" name="amount" value="{{ $subscription->amount }}">
                                                                <input type="hidden" name="plan_id" value="{{ $subscription->id }}">
                                                                <input type="hidden" name="site_id" value="{{ $site->id }}">
                                                                    @if(@$subscriptionPayment->status == 'succeeded')
                                                                    <button type="button" class="btn btn-success">
                                                                         Payment Successful <i class="ri-checkbox-circle-line"></i>
                                                                    </button>
                                                                @else
                                                                <button type="submit" class="btn bg-success">
                                                                    <i class="ri-wallet-line"> </i> Pay ${{ $subscription->amount }}
                                                                </button>
                                                                @endif
                                                            </form>

                                                            @endif

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
                                                            @include('client.partials.site-edit', ['site' => $site])
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
                                                            @include('client.partials.site-view', ['site' => $site])
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
                                </div>
                            </div>




                            <script>
                                document.querySelectorAll('.payButton').forEach(button => {
                                    button.addEventListener('click', function() {
                                        const amount = this.dataset.amount;

                                        fetch("{{ route('stripe.checkout') }}", {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                            },
                                            body: JSON.stringify({
                                                amount: amount
                                            })
                                        }).then(response => {
                                            // Stripe Checkout redirect is handled in backend, so just redirect browser
                                            return response.url ? window.location.href = response.url : null;
                                        });
                                    });
                                });
                            </script>

                             
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
                <form action="{{ route('client.sites.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mt-2">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
                            @error('address')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <!-- City -->
                        <div class="col-md-6 mt-2">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}" required>
                            @error('city')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <!-- Country -->
                        <div class="col-md-6 mt-2">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" required>
                            @error('country')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <!-- Area (sqft) -->
                        <div class="col-md-6 mt-2">
                            <label for="area_sqft" class="form-label">Area (sqft)</label>
                            <input type="number" name="area_sqft" class="form-control" id="area_sqft" value="{{ old('area_sqft') }}" required>
                            @error('area_sqft')<div class="text-danger small">{{ $message }}</div>@enderror
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
                            @error('type')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        <!-- Timezone -->
                        <div class="col-md-6 mt-2">
                            <label for="timezone" class="form-label">Timezone</label>
                            <input type="text" name="timezone" class="form-control" id="timezone" value="{{ old('timezone') }}" required>
                            @error('timezone')<div class="text-danger small">{{ $message }}</div>@enderror
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

@include('client.include.footer')


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
                        <button data-id="${site.id}" class="btn btn-view"><i class="ri-eye-line"></i></button>
                        <button data-id="${site.id}" class="btn btn-edit"><i class="ri-pencil-line"></i></button>
                        <button data-id="${site.id}" class="btn btn-delete"><i class="ri-delete-bin-line"></i></button>
                    </div>
                </td>
            </tr>
        `;
    }

    // Initial sites from server (for JS rendering if we want to rebuild)
    var initialsites = @json(isset($sites) ? $sites -> items() : []);

    // Attach global handlers once DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Create form submit via AJAX
        var createForm = document.querySelector('#createsiteModal form');
        if (createForm) {
            createForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(createForm);
                fetch(createForm.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: formData
                }).then(r => r.json().then(j => ({
                    status: r.status,
                    body: j
                }))).then(obj => {
                    if (obj.status === 201) {
                        // success
                        var tbody = document.getElementById('sites-tbody');
                        tbody.insertAdjacentHTML('afterbegin', siteRowHtml(obj.body.site));
                        var modalEl = document.getElementById('createsiteModal');
                        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                        modal.hide();
                        // clear form
                        createForm.reset();
                    } else if (obj.status === 422) {
                        // show validation errors
                        // simple strategy: show an alert for now
                        alert('Validation errors: ' + JSON.stringify(obj.body.errors));
                    } else {
                        alert('Unexpected response');
                    }
                }).catch(err => {
                    console.error(err);
                    alert('Error creating site');
                });
            });
        }

        // Delegate edit/delete/view button clicks
        document.getElementById('sites-tbody').addEventListener('click', function(e) {
            var target = e.target.closest('button');
            if (!target) return;
            var id = target.getAttribute('data-id');
            if (target.classList.contains('btn-delete')) {
                if (!confirm('Delete this site?')) return;
                fetch(`/client/sites/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(r => r.json()).then(j => {
                        // remove row
                        var row = document.querySelector('[data-site-id="' + id + '"]');
                        if (row) row.remove();
                    }).catch(err => {
                        console.error(err);
                        alert('Delete failed');
                    });
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
        document.getElementById('sites-tbody').addEventListener('submit', function(e) {
            var form = e.target.closest('.site-edit-form');
            if (!form) return;
            e.preventDefault();
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
            }).then(r => r.json().then(j => ({
                status: r.status,
                body: j
            }))).then(obj => {
                if (obj.status === 200) {
                    // update row
                    var row = document.querySelector('[data-site-id="' + id + '"]');
                    if (row) {
                        row.outerHTML = siteRowHtml(obj.body.site);
                    }
                    var modalEl = document.getElementById('editsiteModal-' + id);
                    var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modal.hide();
                } else if (obj.status === 422) {
                    // show per field errors inside modal
                    var errors = obj.body.errors;
                    Object.keys(errors).forEach(function(field) {
                        var el = form.querySelector('[name="' + field + '"]');
                        if (el) {
                            el.classList.add('is-invalid');
                            var errEl = form.querySelector('.' + field + '-error');
                            if (errEl) errEl.textContent = errors[field][0];
                        }
                    });
                } else {
                    alert('Unexpected response');
                }
            }).catch(err => {
                console.error(err);
                alert('Error updating site');
            });
        });
    });
</script>