<!DOCTYPE html>

<!-- saved from url=(0050)index.html -->

<html lang="en" data-sidenav-size="sm-hover-active" data-bs-theme="light" data-menu-color="light"

    data-topbar-color="brand">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <title>Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">

    <meta content="Aeshort" name="author">



    <!-- App favicon -->

    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap5.min.css') }}">



    <!-- Vendor css -->

    <link href="{{ asset('assets/admin/css/vendor.min.css') }}" rel="stylesheet" type="text/css">



    <!-- App css -->

    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">







    <!-- Icons css -->

    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css">



    <!-- Theme Config Js -->

    <script src="{{ asset('assets/admin/js/config.js.download') }}"></script>

    

     <style>


.modal-backdrop.fade.show{
    display:none !important
}
.modal.fade.show {
    background: rgba(0, 0, 0, 0.4);
}
         .toast-container {

        position: fixed;

        top: 1rem;

        right: 1rem;

        z-index: 9999;

      }

    </style> 



</head>



<div class="toast-container">

      @if(session('success'))

        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">

          <div class="d-flex">

            <div class="toast-body">

              {{ session('success') }}

            </div>

            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>

          </div>

        </div>

      @endif

      @if($errors->any())

        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">

          <div class="d-flex">

            <div class="toast-body">

              @foreach($errors->all() as $error)

                {{ $error }}<br>

              @endforeach

            </div>

            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>

          </div>

        </div>

      @endif

    </div>

<body>

    <!-- Begin page -->

    <div class="wrapper active">



        <!-- Menu -->

        <!-- Sidenav Menu Start -->

        <div class="sidenav-menu show">
            <!-- Brand Logo -->

            <a href="{{ route('home') }}" class="logo">

                <span class="logo-light">

                    <span class="logo-lg"><img src="{{ asset('assets/admin/images/logo.png') }}" alt="logo"></span>

                    <span class="logo-sm"><img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo"></span>

                </span>



                <span class="logo-dark">

                    <span class="logo-lg"><img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="dark logo"></span>

                    <span class="logo-sm"><img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo"></span>

                </span>

            </a>



            <!-- Full Sidebar Menu Close Button -->

            <button class="button-close-fullsidebar">

                <i class="ri-close-line align-middle"></i>

            </button>



            <div data-simplebar="init" class="simplebar-scrollable-y">

                <div class="simplebar-wrapper active" style="margin: 0px;">

                    <div class="simplebar-height-auto-observer-wrapper">

                        <div class="simplebar-height-auto-observer"></div>

                    </div>

                    <div class="simplebar-mask show">

                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">

                            <div class="simplebar-content-wrapper active" tabindex="0" role="region"

                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">

                                <div class="simplebar-content show" style="padding: 0px;">



                                    <!--- Sidenav Menu -->

                                    <ul class="side-nav">

                    <li class="side-nav-title">Navigation</li>



                    <li class="side-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <a href="{{ route('home') }}" class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/></svg></span>
                           

                            <span class="menu-text"> Back to Home </span>

                            <span class="badge bg-danger rounded"></span>

                        </a>

                    </li>
                    <li class="side-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <a href="{{ route('admin.dashboard') }}" class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="airplay" class="lucide lucide-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><path d="m12 15 5 6H7Z"></path></svg></span>

                            <span class="menu-text"> Dashboard </span>

                            <span class="badge bg-danger rounded"></span>

                        </a>

                    </li>



                    <li class="side-nav-title">List</li>



                    <li class="side-nav-item {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.clients.index') }}" class="side-nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-account-pin-box-line"></i></span>

                            <span class="menu-text"> Clients Management </span>

                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.technicians.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.technicians.index') }}" class="side-nav-link {{ request()->routeIs('admin.technicians.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-tools-line"></i></span>

                            <span class="menu-text"> Technician Management </span>

                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.sites.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.sites.index') }}" class="side-nav-link {{ request()->routeIs('admin.sites.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-share-forward-box-line"></i></span>

                            <span class="menu-text"> Sites Management </span>

                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.blog.index') }}" class="side-nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-file-text-line"></i></span>

                            <span class="menu-text"> Blog Management </span>
                        </a>

                    </li>
                    
                    <li class="side-nav-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.services.index') }}" class="side-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-file-text-line"></i></span>

                            <span class="menu-text"> Services Management </span>
                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.devices.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.devices.index') }}" class="side-nav-link {{ request()->routeIs('admin.devices.*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-git-merge-line"></i></span>

                            <span class="menu-text"> Devices & Sensors </span>

                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.subscription_plans*') ? 'active' : '' }}">

                        <a href="{{ route('admin.subscription_plans.index') }}" class="side-nav-link {{ request()->routeIs('admin.subscription_plans*') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-bill-fill"></i></span>

                            <span class="menu-text"> Billing & Subscription </span>

                        </a>

                    </li> 

                     <li class="side-nav-item {{ request()->routeIs('admin.subscription.index') ? 'active' : '' }}">

                        <a href="{{ route('admin.subscription.index') }}" class="side-nav-link {{ request()->routeIs('admin.subscription.index') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-wallet-fill"></i></span>

                            <span class="menu-text"> Purchase Plan </span>

                        </a>

                    </li> 

                    <!-- <li class="side-nav-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">

                        <a href="{{ route('admin.reports') }}" class="side-nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-file-chart-line"></i></span>

                            <span class="menu-text"> Reports & Insights </span>

                        </a>

                    </li>

                     <li class="side-nav-item {{ request()->routeIs('admin.notifications') ? 'active' : '' }}">

                        <a href="{{ route('admin.notifications') }}" class="side-nav-link {{ request()->routeIs('admin.notifications') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-notification-3-fill"></i></span>

                            <span class="menu-text"> Notifications / Alerts </span>

                        </a>

                    </li>

                    <li class="side-nav-item {{ request()->routeIs('admin.support') ? 'active' : '' }}">

                        <a href="{{ route('admin.support') }}" class="side-nav-link {{ request()->routeIs('admin.support') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-question-fill"></i></span>

                            <span class="menu-text"> Support Tickets </span>

                        </a>

                    </li>  -->

                       





                    <li class="side-nav-item {{ request()->routeIs('admin.settings') ? 'active' : '' }}">

                        <a href="{{ route('admin.settings') }}" class="side-nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">

                            <span class="menu-icon"><i class="ri-user-fill"></i></span>

                            <span class="menu-text"> Profile </span>

                        </a>

                    </li>





                    



                    <li class="side-nav-item">

                        <form id="admin-logout-form" action="{{ route('admin.logout.perform') }}" method="POST" style="display:none">

                            @csrf

                        </form>

                        <a href="#" class="side-nav-link" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">

                            <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="share" class="lucide lucide-share"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" x2="12" y1="2" y2="15"></line></svg></span>

                            <span class="menu-text"> Log Out </span>

                        </a>

                    </li>                   

                </ul>



                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="simplebar-placeholder" style="width: 240px; height: 826px;"></div>

                </div>

                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">

                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>

                </div>

                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">

                    <div class="simplebar-scrollbar"

                        style="height: 527px; transform: translate3d(0px, 0px, 0px); display: block;"></div>

                </div>

            </div>

        </div>

        <!-- Sidenav Menu End -->



        <!-- Topbar Start -->

        <header class="app-topbar">

            <div class="page-container topbar-menu">

                <div class="d-flex align-items-center gap-2">



                    <!-- Brand Logo -->

                    <a href="{{ route('home') }}" class="logo">

                        <span class="logo-light">

                            <span class="logo-lg"><img src="{{ asset('assets/admin/images/logo.png') }}" alt="logo"></span>

                            <span class="logo-sm"><img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo"></span>

                        </span>



                        <span class="logo-dark">

                            <span class="logo-lg"><img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="dark logo"></span>

                            <span class="logo-sm"><img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="small logo"></span>

                        </span>

                    </a>



                    <!-- Sidebar Menu Toggle Button -->

                    <button class="sidenav-toggle-button px-2">

                        <i class="ri-menu-2-line fs-24"></i>

                    </button>



                    <!-- Horizontal Menu Toggle Button -->

                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse"

                        data-bs-target="#topnav-menu-content">

                        <i class="ri-menu-2-line fs-24"></i>

                    </button>



                    <!-- Search for small devices -->

                    <div class="topbar-item d-flex d-xl-none">

                        <button class="topbar-link" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">

                            <i class="ri-search-line fs-22"></i>

                        </button>

                    </div>



                    <!-- Button Trigger Search Modal -->

                    <div class="topbar-search d-none d-xl-flex gap-2 me-2 align-items-center" data-bs-toggle="modal"

                        data-bs-target="#searchModal" type="button">

                        <i class="ri-search-line fs-18"></i>

                        <span class="me-2">Search something..</span>

                    </div>

                </div>



                <div class="d-flex align-items-center gap-2">







                    <!-- Language Dropdown -->





                    <!-- Notification Dropdown -->

                    {{--<div class="topbar-item">

                        <div class="dropdown">

                            <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown"

                                data-bs-offset="0,25" type="button" data-bs-auto-close="outside" aria-haspopup="false"

                                aria-expanded="false">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"

                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"

                                    stroke-linejoin="round" data-lucide="bell"

                                    class="lucide lucide-bell animate-ring fs-22">

                                    <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>

                                    <path

                                        d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326">

                                    </path>

                                </svg>

                                <span class="noti-icon-badge"></span>

                            </button>



                            <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg"

                                style="min-height: 300px;">

                                <div class="p-2 border-bottom position-relative border-dashed">

                                    <div class="row align-items-center">

                                        <div class="col">

                                            <h6 class="m-0 fs-16 fw-semibold"> Notifications</h6>

                                        </div>

                                        <div class="col-auto">

                                            <div class="dropdown">

                                                <a href="index.html#" class="dropdown-toggle drop-arrow-none link-dark"

                                                    data-bs-toggle="dropdown" data-bs-offset="0,15"

                                                    aria-expanded="false">

                                                    <i class="ri-settings-2-line fs-22 align-middle"></i>

                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <!-- item-->

                                                    <a href="javascript:void(0);" class="dropdown-item">Mark as Read</a>

                                                    <!-- item-->

                                                    <a href="javascript:void(0);" class="dropdown-item">Delete All</a>

                                                    <!-- item-->

                                                    <a href="javascript:void(0);" class="dropdown-item">Do not

                                                        Disturb</a>

                                                    <!-- item-->

                                                    <a href="javascript:void(0);" class="dropdown-item">Other

                                                        Settings</a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="position-relative rounded-0" style="max-height: 300px;"

                                    data-simplebar="init">

                                    <div class="simplebar-wrapper" style="margin: 0px;">

                                        <div class="simplebar-height-auto-observer-wrapper">

                                            <div class="simplebar-height-auto-observer"></div>

                                        </div>

                                        <div class="simplebar-mask">

                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">

                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"

                                                    aria-label="scrollable content"

                                                    style="height: auto; overflow: hidden;">

                                                    <div class="simplebar-content" style="padding: 0px;">

                                                        <!-- item-->

                                                        <div class="dropdown-item notification-item py-2 text-wrap active"

                                                            id="notification-1">

                                                            <span class="d-flex align-items-center">

                                                                <span class="me-3 position-relative flex-shrink-0">

                                                                    <img src="{{ asset('assets/admin/images/avatar-2.jpg') }}"

                                                                        class="avatar-lg rounded-circle" alt="">

                                                                </span>

                                                                <span class="flex-grow-1 text-muted">

                                                                    <span class="fw-medium text-body">Glady Haid</span>

                                                                    commented on <span

                                                                        class="fw-medium text-body">Aeshort admin

                                                                        status</span>

                                                                    <br>

                                                                    <span class="fs-12">25m ago</span>

                                                                </span>

                                                                <span class="notification-item-close">

                                                                    <button type="button"

                                                                        class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"

                                                                        data-dismissible="#notification-1">

                                                                        <i class="ri-close-line fs-16"></i>

                                                                    </button>

                                                                </span>

                                                            </span>

                                                        </div>



                                                        <!-- item-->

                                                        <div class="dropdown-item notification-item py-2 text-wrap"

                                                            id="notification-2">

                                                            <span class="d-flex align-items-center">

                                                                <span class="me-3 position-relative flex-shrink-0">

                                                                    <img src="{{ asset('assets/admin/images/avatar-4.jpg') }}"

                                                                        class="avatar-lg rounded-circle" alt="">

                                                                </span>

                                                                <span class="flex-grow-1 text-muted">

                                                                    <span class="fw-medium text-body">Tommy Berry</span>

                                                                    donated <span class="text-success">$100.00</span>

                                                                    for <span class="fw-medium text-body">Carbon removal

                                                                        program</span>

                                                                    <br>

                                                                    <span class="fs-12">58m ago</span>

                                                                </span>

                                                                <span class="notification-item-close">

                                                                    <button type="button"

                                                                        class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"

                                                                        data-dismissible="#notification-2">

                                                                        <i class="ri-close-line fs-16"></i>

                                                                    </button>

                                                                </span>

                                                            </span>

                                                        </div>



                                                        <!-- item-->

                                                        <div class="dropdown-item notification-item py-2 text-wrap"

                                                            id="notification-3">

                                                            <span class="d-flex align-items-center">

                                                                <div class="avatar-lg flex-shrink-0 me-3">

                                                                    <span

                                                                        class="avatar-title bg-success-subtle text-success rounded-circle fs-22">

                                                                        <iconify-icon

                                                                            icon="solar:wallet-money-bold-duotone"><template

                                                                                shadowrootmode="open">

                                                                                <style data-style="data-style">

                                                                                    :host {

                                                                                        display: inline-block;

                                                                                        vertical-align: 0

                                                                                    }



                                                                                    span,

                                                                                    svg {

                                                                                        display: block

                                                                                    }

                                                                                </style><svg

                                                                                    xmlns="http://www.w3.org/2000/svg"

                                                                                    width="1em" height="1em"

                                                                                    viewBox="0 0 24 24">

                                                                                    <path fill="currentColor"

                                                                                        d="M4.892 9.614c0-.402.323-.728.722-.728H9.47c.4 0 .723.326.723.728a.726.726 0 0 1-.723.729H5.614a.726.726 0 0 1-.722-.729">

                                                                                    </path>

                                                                                    <path fill="currentColor"

                                                                                        fill-rule="evenodd"

                                                                                        d="M21.188 10.004q-.094-.005-.2-.004h-2.773C15.944 10 14 11.736 14 14s1.944 4 4.215 4h2.773q.106.001.2-.004c.923-.056 1.739-.757 1.808-1.737c.004-.064.004-.133.004-.197v-4.124c0-.064 0-.133-.004-.197c-.069-.98-.885-1.68-1.808-1.737m-3.217 5.063c.584 0 1.058-.478 1.058-1.067c0-.59-.474-1.067-1.058-1.067s-1.06.478-1.06 1.067c0 .59.475 1.067 1.06 1.067"

                                                                                        clip-rule="evenodd"></path>

                                                                                    <path fill="currentColor"

                                                                                        d="M21.14 10.002c0-1.181-.044-2.448-.798-3.355a4 4 0 0 0-.233-.256c-.749-.748-1.698-1.08-2.87-1.238C16.099 5 14.644 5 12.806 5h-2.112C8.856 5 7.4 5 6.26 5.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87C2 10.401 2 11.856 2 13.694v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h2.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238q.305-.308.526-.66c.45-.72.504-1.602.504-2.45l-.15.001h-2.774C15.944 18 14 16.264 14 14s1.944-4 4.215-4h2.773q.079 0 .151.002"

                                                                                        opacity=".5"></path>

                                                                                    <path fill="currentColor"

                                                                                        d="M10.101 2.572L8 3.992l-1.733 1.16C7.405 5 8.859 5 10.694 5h2.112c1.838 0 3.294 0 4.433.153q.344.045.662.114L16 4l-2.113-1.428a3.42 3.42 0 0 0-3.786 0">

                                                                                    </path>

                                                                                </svg>

                                                                            </template></iconify-icon>

                                                                    </span>

                                                                </div>

                                                                <span class="flex-grow-1 text-muted">

                                                                    You withdraw a <span

                                                                        class="fw-medium text-body">$500</span> by <span

                                                                        class="fw-medium text-body">New York ATM</span>

                                                                    <br>

                                                                    <span class="fs-12">2h ago</span>

                                                                </span>

                                                                <span class="notification-item-close">

                                                                    <button type="button"

                                                                        class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"

                                                                        data-dismissible="#notification-3">

                                                                        <i class="ri-close-line fs-16"></i>

                                                                    </button>

                                                                </span>

                                                            </span>

                                                        </div>



                                                        <!-- item-->

                                                        <div class="dropdown-item notification-item py-2 text-wrap"

                                                            id="notification-4">

                                                            <span class="d-flex align-items-center">

                                                                <span class="me-3 position-relative flex-shrink-0">

                                                                    <img src="assets/images/avatar-7.jpg"

                                                                        class="avatar-lg rounded-circle" alt="">

                                                                </span>

                                                                <span class="flex-grow-1 text-muted">

                                                                    <span class="fw-medium text-body">Richard

                                                                        Allen</span> followed you in <span

                                                                        class="fw-medium text-body">Facebook</span>

                                                                    <br>

                                                                    <span class="fs-12">3h ago</span>

                                                                </span>

                                                                <span class="notification-item-close">

                                                                    <button type="button"

                                                                        class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"

                                                                        data-dismissible="#notification-4">

                                                                        <i class="ri-close-line fs-16"></i>

                                                                    </button>

                                                                </span>

                                                            </span>

                                                        </div>



                                                        <!-- item-->

                                                        <div class="dropdown-item notification-item py-2 text-wrap"

                                                            id="notification-5">

                                                            <span class="d-flex align-items-center">

                                                                <span class="me-3 position-relative flex-shrink-0">

                                                                    <img src="assets/images/avatar-10.jpg"

                                                                        class="avatar-lg rounded-circle" alt="">

                                                                </span>

                                                                <span class="flex-grow-1 text-muted">

                                                                    <span class="fw-medium text-body">Victor

                                                                        Collier</span> liked you recent photo

                                                                    in <span

                                                                        class="fw-medium text-body">Instagram</span>

                                                                    <br>

                                                                    <span class="fs-12">10h ago</span>

                                                                </span>

                                                                <span class="notification-item-close">

                                                                    <button type="button"

                                                                        class="btn btn-ghost-danger rounded-circle btn-sm btn-icon"

                                                                        data-dismissible="#notification-5">

                                                                        <i class="ri-close-line fs-16"></i>

                                                                    </button>

                                                                </span>

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>

                                    </div>

                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">

                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>

                                    </div>

                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">

                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>

                                    </div>

                                </div>



                                <!-- All-->

                                <a href="javascript:void(0);"

                                    class="dropdown-item position-absolute bottom-0 notification-item text-center text-reset text-decoration-underline fw-bold notify-item border-top border-light py-2">

                                    View All

                                </a>

                            </div>

                        </div>

                    </div>--}}







                    



                    <!-- User Dropdown -->

                     @php 

                        $admin = Auth::guard('admin')->user();

                     @endphp

                    <div class="topbar-item nav-user">

                        <div class="dropdown">

                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"

                                data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">

                                <img src="{{ asset('assets/admin/images/avatar-3.jpg') }}" width="32" class="rounded-circle me-lg-2 d-flex"

                                    alt="user-image">

                                <span class="d-lg-flex flex-column gap-1 d-none">

                                    <span class="fw-semibold">{{ $admin->name }}</span>

                                </span>

                                <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-2"></i>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end">

                                <!-- item-->

                                <div class="dropdown-header noti-title">

                                    <h6 class="text-overflow m-0">Welcome !</h6>

                                </div>

                                <!-- item-->

                                <a href="{{ route('admin.settings') }}" class="dropdown-item">

                                    <i class="ri-account-circle-line me-1 fs-16 align-middle"></i>

                                    <span class="align-middle">Profile</span>

                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->

                                <a href="{{ route('admin.logout.perform') }}" class="dropdown-item fw-semibold text-danger" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">

                                    <i class="ri-logout-box-line me-1 fs-16 align-middle"></i>

                                    <span class="align-middle">Sign Out</span>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- Topbar End -->



        <!-- Search Modal -->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">

                <div class="modal-content bg-transparent">

                    <form>

                        <div class="card mb-1">

                            <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">

                                <i class="ri-search-line fs-22"></i>

                                <input type="search" class="form-control border-0" id="search-modal-input"

                                    placeholder="Search for actions, people,">

                                <button type="submit" class="btn p-0" data-bs-dismiss="modal"

                                    aria-label="Close"><i class="ri-close-fill"></i></button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

