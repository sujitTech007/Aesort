@include('admin.include.header')
<div class="page-content">
    <div class="page-title-head d-flex align-items-center gap-2">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-bold mb-0 py-2">Settings</h4>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Update Profile -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" style="background-color: #163300;">
                        <h5 class="mb-0">Update Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updateProfile') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}">
                            </div>



                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Password -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white" style="background-color: #163300;">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.updatePassword') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Password</label>
                                <input type="password" name="current_password" class="form-control" autocomplete="current-password" required>
                                @error('current_password')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">New Password</label>
                                <input type="password" name="new_password" class="form-control" autocomplete="new-password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" autocomplete="new-password" required>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-secondary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-1">

    <!-- Security Settings -->
    <div class="col-lg-6">
        <div class="card shadow-sm border-0">

            <div class="card-header text-white" style="background-color: #163300;">
                <h6 class="mb-0">Security</h6>
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="mb-1">Two-Factor Authentication</h6>
                        <p class="text-muted small mb-0">
                            Add an extra layer of security to your admin account.
                        </p>
                    </div>

                    <span class="badge bg-secondary">Disabled</span>
                </div>

                <div class="d-flex justify-content-between align-items-center border-top pt-3">
                    <div>
                        <span class="small">2FA Protection</span>
                    </div>

                    <button type="button" class="btn btn-success btn-sm">
                        <i class="fas fa-shield-alt me-1"></i>
                        Enable 2FA
                    </button>
                </div>

            </div>
        </div>
    </div>

</div>
    </div>
</div>


@include('admin.include.footer')