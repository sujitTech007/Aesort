<!DOCTYPE html>



<!-- saved from url=(0050)index.html -->



<html lang="en" data-sidenav-size="sm-hover-active" data-bs-theme="light" data-menu-color="light"



    data-topbar-color="brand">







<head>



    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">







    <title>Admin Login</title>



    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta name="csrf-token" content="{{ csrf_token() }}">





    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">



    <meta content="Aeshort" name="author">





    <!-- App favicon -->



    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">



    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<style>
   
body{
     font-family: "Roboto", sans-serif;
     font-size: 14px;
}
.form-control{
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    padding: 10px;
    height: 45px;
}
button.btn{
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    padding: 10px 20px;
    height: 45px;
}
</style>



</head>







<body>







    <!-- Topbar End -->










<div class="min-vh-100 d-flex align-items-center bg-light py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div class="card border-0 shadow rounded-4">

                    <div class="card-body p-4 p-md-5">

                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <a href="{{ route('home') }}" class="d-inline-block">
                                <img src="{{ asset('assets/images/logo1.png') }}"
                                     alt="Logo"
                                     class="img-fluid"
                                     style="max-height: 65px;">
                            </a>
                        </div>

                        <!-- Heading -->
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-2" style="color: #184b1f;">
                                Admin Login
                            </h2>
                            <p class="text-muted mb-0">
                                Sign in to access your admin dashboard
                            </p>
                        </div>

                        <!-- Success Message -->
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form action="{{ route('admin.login.perform') }}" method="POST">

                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Email Address
                                </label>

                                <div class="input-group">
                                   
                                    <input type="email"
                                           name="email"
                                           class="form-control"
                                           placeholder="Enter your email"
                                           required
                                           value="{{ old('email') }}">
                                </div>

                                @error('email')
                                    <div class="text-danger small mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Password
                                </label>

                                <div class="input-group">
                                    
                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="Enter your password"
                                           required>
                                </div>
                            </div>

                            <!-- Login Button -->
                            <div class="d-grid">
                                <button type="submit"
                                        class="btn btn-success btn-lg rounded-3">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i>
                                    Login
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        Admin Panel
                    </small>
                </div>

            </div>

        </div>

    </div>

</div>








</body>



</html>