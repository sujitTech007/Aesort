<form class="client-edit-form" data-client-id="{{ $client->id }}" action="{{ route('admin.clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name-{{ $client->id }}" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name-{{ $client->id }}" value="{{ old('name', $client->name) }}" required>
            <div class="invalid-feedback d-block name-error"></div>
        </div>
        <div class="col-md-6">
            <label for="email-{{ $client->id }}" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email-{{ $client->id }}" value="{{ old('email', $client->email) }}" required>
            <div class="invalid-feedback d-block email-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="phone-{{ $client->id }}" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone-{{ $client->id }}" value="{{ old('phone', $client->phone) }}">
            <div class="invalid-feedback d-block phone-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="company_name-{{ $client->id }}" class="form-label">Company</label>
            <input type="text" name="company_name" class="form-control" id="company_name-{{ $client->id }}" value="{{ old('company_name', $client->company_name) }}">
            <div class="invalid-feedback d-block company_name-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="status-{{ $client->id }}" class="form-label">Status</label>
            <select name="status" class="form-select" id="status-{{ $client->id }}">
                <option value="1" {{ old('status', $client->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $client->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <div class="invalid-feedback d-block status-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="password-{{ $client->id }}" class="form-label">Password (leave blank to keep)</label>
            <input type="password" name="password" class="form-control" id="password-{{ $client->id }}">
            <div class="invalid-feedback d-block password-error"></div>
        </div>
    </div>

    <div class="modal-footer mt-4 border-0 d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
    </div>
</form>
