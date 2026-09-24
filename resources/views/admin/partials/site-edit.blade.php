<form class="site-edit-form" data-site-id="{{ $site->id }}" action="{{ route('admin.sites.update', $site->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <!-- User ID (Hidden) -->
        <select name="user_id" id="user_id" class="form-select" required>
            <option value="">Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $site->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} (ID: {{ $user->id }})</option>
            @endforeach
        </select>

        <!-- Name -->
        <div class="col-md-6">
            <label for="name-{{ $site->id }}" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name-{{ $site->id }}" value="{{ old('name', $site->name) }}" required>
            <div class="invalid-feedback name-error"></div>
        </div>

        <!-- Address -->
        <div class="col-md-6">
            <label for="address-{{ $site->id }}" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address-{{ $site->id }}" value="{{ old('address', $site->address) }}" required>
            <div class="invalid-feedback address-error"></div>
        </div>

        <!-- City -->
        <div class="col-md-6 mt-2">
            <label for="city-{{ $site->id }}" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city-{{ $site->id }}" value="{{ old('city', $site->city) }}" required>
            <div class="invalid-feedback city-error"></div>
        </div>

        <!-- Country -->
        <div class="col-md-6 mt-2">
            <label for="country-{{ $site->id }}" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="country-{{ $site->id }}" value="{{ old('country', $site->country) }}" required>
            <div class="invalid-feedback country-error"></div>
        </div>

        <!-- Area (sqft) -->
        <div class="col-md-6 mt-2">
            <label for="area_sqft-{{ $site->id }}" class="form-label">Area (sqft)</label>
            <input type="number" name="area_sqft" class="form-control" id="area_sqft-{{ $site->id }}" value="{{ old('area_sqft', $site->area_sqft) }}" required>
            <div class="invalid-feedback area-error"></div>
        </div>

        <!-- Type -->
        <div class="col-md-6 mt-2">
            <label for="type-{{ $site->id }}" class="form-label">Type</label>
            <select name="type" class="form-select" id="type-{{ $site->id }}" required>
                <option value="">Select Type</option>
                <option value="office" {{ old('type', $site->type) == 'office' ? 'selected' : '' }}>Office</option>
                <option value="hotel" {{ old('type', $site->type) == 'hotel' ? 'selected' : '' }}>Hotel</option>
                <option value="retail" {{ old('type', $site->type) == 'retail' ? 'selected' : '' }}>Retail</option>
                <option value="hospital" {{ old('type', $site->type) == 'hospital' ? 'selected' : '' }}>Hospital</option>
                <option value="school" {{ old('type', $site->type) == 'school' ? 'selected' : '' }}>School</option>
                <option value="other" {{ old('type', $site->type) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <div class="invalid-feedback type-error"></div>
        </div>

        <!-- Timezone -->
        <div class="col-md-6 mt-2">
            <label for="timezone-{{ $site->id }}" class="form-label">Timezone</label>
            <input type="text" name="timezone" class="form-control" id="timezone-{{ $site->id }}" value="{{ old('timezone', $site->timezone) }}" required>
            <div class="invalid-feedback timezone-error"></div>
        </div>

        <!-- Status -->
        <div class="col-md-6 mt-2">
            <label for="status-{{ $site->id }}" class="form-label">Status</label>
            <select name="status" class="form-select" id="status-{{ $site->id }}">
                <option value="1" {{ old('status', $site->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $site->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <div class="invalid-feedback status-error"></div>
        </div>
    </div>

    <div class="modal-footer mt-4 border-0 d-flex align-items-center justify-content-center">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
