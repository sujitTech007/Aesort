<div class="modalListViwe-box">
    <div class="tableStatusList mb-1">
        <div class="row justify-content-between px-3">
            
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Application No:</h5>
                <p>{{ $site->id }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>User ID:</h5>
                <p>{{ $site->user_id }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Name:</h5>
                <p>{{ $site->name }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Address:</h5>
                <p>{{ $site->address }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>City:</h5>
                <p>{{ $site->city }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Country:</h5>
                <p>{{ $site->country }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Area (sqft):</h5>
                <p>{{ $site->area_sqft }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Type:</h5>
                <p class="text-capitalize">{{ $site->type }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Timezone:</h5>
                <p>{{ $site->timezone }}</p>
            </div>

            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Status:</h5>
                <p>
                    @if($site->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
