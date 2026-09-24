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
        .toast-container {



            position: fixed;



            top: 1rem;



            right: 1rem;



            z-index: 9999;



        }
    </style>







</head>







<body>







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





    <div class="why-chooseus-layout2">

        <div class="container-fluid">

            <div class="row no-gap row-equal-height  justify-content-center ">



                <div class="col-lg-12">

                    <div class="contact-form-box">
                        <div class="logodiv">
                            <a class="navbar-brand" href="{{route('home')}}">

                                <img src="{{ asset('assets/images/logo1.png ')}}" alt="Logo">

                            </a>
                        </div>
                        <div class="section-title">

                            <h2 class="text-anime wow fadeInUp" style="
    color: #184b1f;
    font-size: 25px;
    padding: 0px 0px 20px;
">Admin Login</h2>

                        </div>

                        <div class="contact-form wow fadeInUp" data-wow-delay="0.75s">

                            @if(session('status'))

                            <div class="alert alert-success">{{ session('status') }}</div>

                            @endif

                            <form action="{{ route('admin.login.perform') }}" method="POST">

                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-12 mb-4">

                                        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">

                                        @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror

                                    </div>

                                    <div class="form-group col-md-12 mb-4" style="position: relative;">

                                        <input type="password" name="password" class="form-control" placeholder="Password" required>

                                    </div>

                                    <div class="col-md-12 text-center mb-3">

                                        <button type="submit" class="btn-default">Login</button>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>











    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Vendor js -->

    <script src="{{ asset('assets/admin/js/vendor.min.js.download') }}"></script>



    <!-- App js -->

    <script src="{{ asset('assets/admin/js/app.js.download') }}"></script>



    <!-- Apex Chart js -->

    <script src="{{ asset('assets/admin/js/apexcharts.min.js.download') }}"></script>



    <!-- Projects Analytics Dashboard App js -->

    <script src="{{ asset('assets/admin/js/dashboard.js.download') }}"></script>







    <!-- Toast Container -->

    <div id="toastContainer" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>



    <style>
        .invalid-feedback {

            display: block !important;

            color: #dc3545;

            font-size: 0.875rem;

            margin-top: 0.25rem;

        }



        .is-invalid {

            border-color: #dc3545 !important;

        }

        /* Center whole section */
        .why-chooseus-layout2 .container-fluid {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form Box Design */
        .contact-form-box {
            background: #ffffff;
            padding: 40px 30px;
            border: 1px solid #e5e5e5;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.08);
            text-align: center;
            position: relative;
        }

        /* Logo */
        .contact-form-box::before {
            content: "";
            background: url('your-logo.png') no-repeat center;
            background-size: 100px;
            width: 100px;
            height: 100px;
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Add space for logo */
        .section-title {
            margin-top: 30px;
        }

        /* Input style */
        .contact-form .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #dcdcdc;
            padding-left: 15px;
        }

        /* Button */
        .btn-default {
            width: 100%;
            height: 50px;
            border-radius: 8px;
            background: #97bd4e;
            color: #fff;
            border: none;
            transition: 0.3s;
        }

        .btn-default:hover {
            background: #084ec4;
        }
    </style>



    <script>
        $('.accordian-body').on('show.bs.collapse', function() {

            $(this).closest("table")

                .find(".collapse.in .action")

                .not(this)

                .collapse('toggle')

        })



        // Toast notification function

        function showToast(message, type = 'info', duration = 3000) {

            const toastId = 'toast-' + Date.now();

            const bgClass = {

                'success': 'bg-success',

                'error': 'bg-danger',

                'warning': 'bg-warning',

                'info': 'bg-info'

            } [type] || 'bg-info';



            const textColor = type === 'warning' ? 'text-dark' : 'text-white';



            const toastHTML = `

                <div id="${toastId}" class="toast align-items-center ${bgClass} ${textColor} border-0" role="alert" aria-live="assertive" aria-atomic="true">

                    <div class="d-flex">

                        <div class="toast-body">

                            ${message}

                        </div>

                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>

                    </div>

                </div>

            `;



            $('#toastContainer').append(toastHTML);

            const toastElement = document.getElementById(toastId);

            const toast = new bootstrap.Toast(toastElement, {
                delay: duration
            });

            toast.show();



            // Remove toast from DOM after it's hidden

            toastElement.addEventListener('hidden.bs.toast', function() {

                toastElement.remove();

            });

        }
    </script>





</body>



</html>