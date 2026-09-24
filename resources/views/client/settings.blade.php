@include('client.include.header')

<div class="page-content">
    <div class="container">

        <!-- Main Row -->
        <div class="row d-flex justify-content-between">
            <div class="col-md-3">
                @include('client/include.sidebar-nav') 
            </div>
           <div class="col-md-9">
             <div class="page-content-col">



                <div class="page-title-head d-flex align-items-center gap-2">

                    <div class="flex-grow-1">

                        <h4 class="fs-18 fw-bold mb-0 py-2">Profile & Settings</h4>

                    </div>

                </div>



                <div class="row mt-2 p-0">

                    {{-- Profile Update Form --}}

                    <div class="col-md-6">

                        <div class="card p-4 shadow-sm">

                            <h5 class="mb-3 fw-bold">Update Profile</h5>

                            <form action="{{ route('client.profile.update') }}" method="POST">

                                @csrf

                                <!-- @method('PUT') -->



                                <div class="mb-3">

                                    <label class="form-label">Full Name</label>

                                    <input type="text" name="name" class="form-control" 

                                        value="{{ old('name', auth()->user()->name) }}" required>

                                </div>



                                <div class="mb-3">

                                    <label class="form-label">Email Address</label>

                                    <input type="email" name="email" class="form-control" 

                                        value="{{ old('email', auth()->user()->email) }}" required>

                                </div>



                                <div class="mb-3">

                                    <label class="form-label">Phone Number</label>

                                    <input type="text" name="phone" class="form-control" 

                                        value="{{ old('phone', auth()->user()->phone) }}">

                                </div>



                                <div class="mb-3">

                                    <label class="form-label">Company Name</label>

                                    <input type="text" name="company_name" class="form-control" 

                                        value="{{ old('company_name', auth()->user()->company_name) }}">

                                </div>



                                <button type="submit" class="btn btn-primary">Update Profile</button>

                            </form>

                        </div>

                    </div>



                    {{-- Change Password Form --}}

                    <div class="col-md-6">

                        <div class="card p-4 shadow-sm">

                            <h5 class="mb-3 fw-bold">Change Password</h5>

                            <form action="{{ route('client.password.update') }}" method="POST">

                                @csrf

                            



                                <!-- <div class="mb-3">

                                    <label class="form-label">Current Password</label>

                                    <input type="password" name="current_password" class="form-control" required>

                                </div> -->



                                <div class="mb-3">

                                    <label class="form-label">New Password</label>

                                    <input type="password" name="new_password" class="form-control" required>

                                </div>



                                <div class="mb-3">

                                    <label class="form-label">Confirm New Password</label>

                                    <input type="password" name="new_password_confirmation" class="form-control" required>

                                </div>



                                <button type="submit" class="btn btn-warning">Change Password</button>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>



@include('client.include.footer')

