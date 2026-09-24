<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Aesort">

    <!-- Title -->
    <title>{{ $pageTitle ?? 'Aesort - Home' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/loader-icon.png') }}">
    <!-- Vendor CSS -->
    <link href="{{ asset('assets/admin/css/vendor.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap DataTable -->
    <link href="{{ asset('assets/admin/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" media="screen">
    <!-- Animation -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Main App CSS -->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css">
    <!-- Admin Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
    <!-- Theme Config -->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/monitoring.css') }}">
 <style>
       
    </style>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            try {
                var msgs = document.querySelectorAll('.flash-message');
                if (!msgs || msgs.length === 0) return;
                // Auto-hide after 3 seconds
                setTimeout(function () {
                    msgs.forEach(function (m) { m.classList.add('flash-hide'); });
                    // remove from DOM after transition (allow 700ms)
                    setTimeout(function () { msgs.forEach(function (m) { if (m && m.parentNode) m.parentNode.removeChild(m); }); }, 700);
                }, 3000);
            } catch (e) {
                // silent fail
                console.error(e);
            }
        });
    </script>

</head>
<body class="tt-magic-cursor">
    @include('include.flash')
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <div class="topbar m-0 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="topbar-contact-info">
                        <ul>
                            <li><a href="mailto:info@aesort.ca"><i class="fa-solid fa-envelope"></i>info@aesort.ca</a></li>
                            <li><a href="tel:+14373831136"><i class="fa-solid fa-phone"></i>  +1 (437) 383-1136</a></li>
                            <li><a href="tel:+16475123975"><i class="fa-solid fa-phone"></i> +1 (647) 512-3975</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="header-social-links">
                        <ul>
                            <li><a href="https://www.facebook.com/aesort.ca/"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/aesort/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="https://www.instagram.com/aesort.ca/"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="main-header h-auto">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo1.png') }}" alt="Logo"></a>
                    <div class="collapse navbar-collapse justify-content-between main-menu">
                        <ul class="navbar-nav mx-auto" id="menu">                            
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>                                
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'about' ? 'active' : '' }}" href="{{ route('about') }}">About us</a></li>
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'services' ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'subscription' ? 'active' : '' }}" href="{{ route('subscription') }}">Subscription</a></li>
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'blog' ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                            <li class="nav-item"><a class="nav-link {{ ($currentPage ?? '') == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                        <div class="d-flex align-items-center gap-2">
                            <div class="topbar-item nav-user border-0 gap-0 h-auto" style="min-height: auto;"><div class="dropdown">
                                <a href="#" class="topbar-link dropdown-toggle drop-arrow-none d-flex align-items-center" data-bs-toggle="dropdown" data-bs-offset="0,25" aria-expanded="false">
                                    <img src="{{ asset('assets/admin/images/avatar-3.jpg') }}" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                    <span class="d-lg-flex flex-column gap-1 d-none">{{ auth()->user()->name }}</span><i class="ri-arrow-down-s-line d-none d-lg-block align-middle pt-1" style="font-size: 18px;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <a href="{{ route('client.profile') }}" class="dropdown-item"><i class="ri-account-circle-line me-1 fs-16 align-middle"></i><span class="align-middle">Profile</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('client.logout') }}" class="dropdown-item fw-semibold text-danger"><i class="ri-logout-box-line me-1 fs-16 align-middle"></i><span class="align-middle">Sign Out</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
            </nav>
            <div class="responsive-menu"></div>
        </div>        
    </header>

            

