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

    <!-- Page Title -->

    <title>{{ $pageTitle ?? 'Aesort - Home' }}</title>

    <!-- Favicon Icon -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/loader-icon.png') }}">

    <!-- Google Fonts css-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link

        href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&amp;family=Rubik:wght@400;500&amp;display=swap"

        rel="stylesheet">

    <!-- Bootstrap css -->

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    @if(Route::is('login') || Route::is('signup') || Route::is('password.request'))

        <link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet" media="screen">
@endif
    <!-- SlickNav css -->

    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">

    <!-- Swiper css -->

    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">

    <!-- Font Awesome icon css-->

    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" media="screen">

    <!-- Animated css -->

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">

    <!-- Magnific css -->

    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">

    <!-- Main custom css -->

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" media="screen">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>





    <body class="tt-magic-cursor">

    @include('include.flash')

    <!-- Preloader Start -->

    <!-- <div class="preloader">

        <div class="loading-container">

            <div class="loading"></div>

            <div id="loading-icon"><img src="assets/images/loader-icon.png" alt=""></div>

        </div>

    </div> -->

    <!-- Preloader End -->



    <!-- Magic Cursor Start -->

    <div id="magic-cursor">

        <div id="ball"></div>

    </div>

    <!-- Magic Cursor End -->



    <!-- Topbar Section Start -->

    <div class="topbar wow fadeInUp">

        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <!-- Topbar Contact Information Start -->

                    <div class="topbar-contact-info">

                        <ul>

                            <li><a href="mailto:info@aesort.ca"><i class="fa-solid fa-envelope"></i>info@aesort.ca</a></li>

                            <!-- <li><a href="tel:+14373831136"><i class="fa-solid fa-phone"></i>  +1 (437) 383-1136</a></li> -->
                            <li><a href="tel:+16475123975"><i class="fa-solid fa-phone"></i> +1 (647) 512-3975</a></li>

                        </ul>

                    </div>

                    <!-- Topbar Contact Information End -->

                </div>



                <div class="col-md-4">

                    <!-- Topbar Social Links Start -->

                    <div class="header-social-links">

                        <ul>

										<li><a href="https://www.facebook.com/aesort.ca/"><i class="fa-brands fa-facebook-f"></i></a></li>

										<li><a href="https://www.linkedin.com/company/aesort/"><i class="fa-brands fa-linkedin-in"></i></a></li>

										<li><a href="https://www.instagram.com/aesort.ca/"><i class="fa-brands fa-instagram"></i></a></li>

									</ul>

                    </div>

                    <!-- Topbar Social Links End -->

                </div>

            </div>

        </div>

    </div>

    <!-- Topbar Section End -->



    <!-- Header Start -->

    <header class="main-header">

        <div class="header-sticky">

            <nav class="navbar navbar-expand-lg">

                <div class="container">

                    <!-- Logo Start -->

                    <a class="navbar-brand" href="{{ route('home') }}">

                        <img src="{{ asset('assets/images/logo1.png') }}" alt="Logo">

                    </a>

                    <!-- Logo End -->



                    <!-- Main Menu start -->

                    <div class="collapse navbar-collapse justify-content-between main-menu">

                        <!-- Centered Nav Tabs -->

                        <ul class="navbar-nav mx-auto" id="menu">

                            <li class="nav-item">

                                <a class="nav-link {{ ($currentPage ?? '') == 'home' ? 'active' : '' }}"

                                    href="{{ route('home') }}">Home</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link {{ ($currentPage ?? '') == 'about' ? 'active' : '' }}"

                                    href="{{ route('about') }}">About us</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link {{ ($currentPage ?? '') == 'services' ? 'active' : '' }}"

                                    href="{{ route('services') }}">Services</a>

                            </li>

                                                 <li class="nav-item">

                                                                <a class="nav-link {{ ($currentPage ?? '') == 'subscription' ? 'active' : '' }}"

                                                                 href="{{ route('subscription') }}">

                                                                     Subscription

                                                                 </a>

                                                </li>





                            <li class="nav-item">

                                <a class="nav-link {{ ($currentPage ?? '') == 'blog' ? 'active' : '' }}"

                                    href="{{ route('blog') }}">Blog</a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link {{ ($currentPage ?? '') == 'contact' ? 'active' : '' }}"

                                    href="{{ route('contact') }}">Contact</a>

                            </li>

                          

                        </ul>

                        <div class="header_login">
                            <ul class="p-0 d-flex header-btn-group">
                                 @if(auth()->check())

                                <li class="nav-item highlighted-menu">

                                    <a class="fw-bold theme_text_color theme_btn" href="{{ route('client.dashboard') }}">Dashboard</a>

                                </li>

                                @else
                                <li class="nav-item highlighted-menu">

                                    <!-- <a class="nav-link" href="{{ route('signup') }}">SignUp</a> -->
                                    <a class="fw-bold theme_text_color" href="{{ route('login') }}"><i class="fa-solid fa-user me-1"></i> LogIn</a>

                                </li>

                                <li>
                                    <a class="btn-default" href="{{ route('request.demo') }}">Request a Demo</a>

                                    

                                </li>

                                

                                @endif
                            </ul>
                        </div>


                        

                    </div>



                    <!-- Main Menu End -->



                    <div class="navbar-toggle"></div>

                </div>

            </nav>



            <div class="responsive-menu"></div>

        </div>

    </header>

    <!-- Header End -->