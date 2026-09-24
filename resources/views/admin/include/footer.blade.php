









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

    </style>



    <script>

        $('.accordian-body').on('show.bs.collapse', function () {

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

            }[type] || 'bg-info';



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

            const toast = new bootstrap.Toast(toastElement, { delay: duration });

            toast.show();



            // Remove toast from DOM after it's hidden

            toastElement.addEventListener('hidden.bs.toast', function() {

                toastElement.remove();

            });

        }

    </script>





</body>



</html>