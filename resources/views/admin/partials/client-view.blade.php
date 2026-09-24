<div class="modalListViwe-box">
    <div class="tableStatusList mb-1">
        <div class="row justify-content-between px-3">
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Application No:</h5>
                <p>{{ $client->id }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Name:</h5>
                <p>{{ $client->name }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Email:</h5>
                <p>{{ $client->email }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Phone:</h5>
                <p>{{ $client->phone }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Company:</h5>
                <p>{{ $client->company_name }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Role:</h5>
                <p>{{ $client->roleName() }}</p>
            </div>
            <div class="col-md-6 d-flex justify-content-start align-items-center py-1">
                <h5>Status:</h5>
                <p>{{ $client->statusName() }}</p>
            </div>
        </div>
    </div>
</div>
