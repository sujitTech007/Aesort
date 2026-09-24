<form class="technician-edit-form" data-technician-id="{{ $technician->id }}" action="{{ route('admin.technicians.update', $technician->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name-{{ $technician->id }}" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name-{{ $technician->id }}" value="{{ old('name', $technician->name) }}" required>
            <div class="invalid-feedback name-error"></div>
        </div>
        <div class="col-md-6">
            <label for="email-{{ $technician->id }}" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email-{{ $technician->id }}" value="{{ old('email', $technician->email) }}" required>
            <div class="invalid-feedback email-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="phone-{{ $technician->id }}" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone-{{ $technician->id }}" value="{{ old('phone', $technician->phone) }}">
            <div class="invalid-feedback phone-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="company_name-{{ $technician->id }}" class="form-label">Company</label>
            <input type="text" name="company_name" class="form-control" id="company_name-{{ $technician->id }}" value="{{ old('company_name', $technician->company_name) }}">
            <div class="invalid-feedback company-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="status-{{ $technician->id }}" class="form-label">Status</label>
            <select name="status" class="form-select" id="status-{{ $technician->id }}">
                <option value="1" {{ old('status', $technician->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $technician->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <div class="invalid-feedback status-error"></div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="password-{{ $technician->id }}" class="form-label">Password (leave blank to keep)</label>
            <input type="password" name="password" class="form-control" id="password-{{ $technician->id }}">
            <div class="invalid-feedback password-error"></div>
        </div>
    </div>

    <div class="modal-footer mt-4 border-0 d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
    </div>
</form>
