	<!-- Footer Start -->

	<footer class="main-footer">

		<!-- Footer Contact Start -->

		<div class="footer-contact">

			<div class="container">

				<div class="row">

					<div class="col-lg-4">

						<!-- Footer Contact Box Start -->

						<div class="footer-contact-box wow fadeInUp" data-wow-delay="0.25s">

							<div class="contact-icon-box">

								<img src="{{asset('assets/images/icon-email.svg') }}" alt="Email">

							</div>



							<div class="footer-contact-info">

								<h3>Support & Email</h3>

								<p>info@aesort.ca</p>

							</div>

						</div>

						<!-- Footer Contact Box End -->

					</div>



					<div class="col-lg-4">

						<!-- Footer Contact Box Start -->

						<div class="footer-contact-box wow fadeInUp" data-wow-delay="0.5s">

							<div class="contact-icon-box">
								<img src="{{asset('assets/images/icon-phone.svg') }}" alt="Phone">

							</div>



							<div class="footer-contact-info">

								<h3>Customer Support</h3>

								<p> +1 (647) 512-3975</p>

							</div>

						</div>

						<!-- Footer Contact Box End -->

					</div>



					<div class="col-lg-4">

						<!-- Footer Contact Box Start -->

						<div class="footer-contact-box wow fadeInUp" data-wow-delay="0.75s">

							<div class="contact-icon-box">

								<img src="{{asset('assets/images/icon-location.svg') }}" alt="location">
								

							</div>



							<div class="footer-contact-info">

								<h3>Our Location</h3>

								<p>Suite 301, 231 Oak Park Blvd, Oakville, ON L6H 7S8</p>

							</div>

						</div>

						<!-- Footer Contact Box End -->

					</div>

				</div>

			</div>

		</div>

		<!-- Footer Contact End -->



		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<!-- Mega Footer Start -->

					<div class="mega-footer">

						<div class="row">

							<div class="col-lg-3 col-md-12">

								<!-- Footer About Start -->

								<div class="footer-about">

									<figure>
										<img src="{{asset('assets/images/aesortlogo-footer.png') }}" alt="logo">										

									</figure>

									<p>Aesort Smart Energy Inc. delivers smart energy solutions to cut costs, boost efficiency, and drive sustainability for businesses.</p>

								</div>

								<!-- Footer About End -->



								<!-- Footer Social Link Start -->

								<div class="footer-social-links">

									<ul>

										<li><a href="https://www.facebook.com/aesort.ca/"  target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>

										<li><a href="https://www.linkedin.com/company/aesort/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>

										<li><a href="https://www.instagram.com/aesort.ca/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>

									</ul>

								</div>

								<!-- Footer Social Link End -->

							</div>



							<div class="col-lg-3 col-md-4">

								<!-- Footer Links Start -->

								<div class="footer-links">

									<h2>Quick Links</h2>

									<ul>

										<li><a href="{{ route('about') }}">About Us</a></li>

										<li><a href="{{ route('services') }}">Services</a></li>

										<li><a href="{{ route('blog') }}">Blog</a></li>

										<li><a href="{{ route('contact') }}">Contact Us</a></li>
										
										<li><a href="{{ route('faqs') }}">FAQs</a></li>

									</ul>

								</div>

								<!-- Footer Links End -->

							</div>@php 
							 $services_links = App\Models\Service::where('status' , 1)->limit(5)->get();
							 @endphp

							<div class="col-lg-3 col-md-4">

								<!-- Footer Links Start -->

								<div class="footer-links">

									<h2>Services</h2>

									<ul>
                                    @foreach($services_links as $services_link)
										<li><a href="{{ route('service.detail', $services_link->slug ) }}">{{ $services_link->title}}</a></li>
									@endforeach

									</ul>

								</div>

								<!-- Footer Links End -->

							</div>



							<div class="col-lg-3 col-md-4">

								<!-- Footer Links Start -->

								<div class="footer-links">

									<h2>Useful Links</h2>

									<ul>

										<li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
										
										<li><a href="{{ route('cookies.policy') }}">Cookies Policy</a></li>

										<li><a href="{{ route('terms.conditions') }}">Term & Conditions</a></li>

									

									</ul>

								</div>

								<!-- Footer Links End -->

							</div>

						</div>

					</div>

					<!-- Mega Footer End -->



					<!-- Copyright Footer Start -->

					<div class="footer-copyright">

						<div class="row">

							<div class="col-md-12">

								<!-- Footer Copyright Content Start -->

								<div class="footer-copyright-text">

									<p>Copyright © 2026 Aesort Smart Energy Inc. All Rights Reserved.</p>

								</div>

								<!-- Footer Copyright Content End -->

							</div>

						</div>

					</div>

					<!-- Copyright Footer End -->

				</div>

			</div>

		</div>

	</footer>

    
    
  

	<!-- Footer End -->

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Bootstrap Bundle -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/analytics-demo.js') }}"></script>


<!-- Media -->
<script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>

<!-- WOW Animation -->
<script src="{{ asset('assets/js/wow.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/function.js') }}"></script>
<script src="{{ asset('assets/js/theme-panel.js') }}"></script>

<!-- Bootstrap Select -->
@if(Route::is('login') || Route::is('signup') || Route::is('password.request'))
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.selectpicker').selectpicker();
        });
    </script>
@endif

<!-- Admin Vendor JS -->
<script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>

<!-- Admin App JS -->
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

<!-- Apex Charts -->
<script src="{{ asset('assets/admin/js/apexcharts.min.js') }}"></script>

<!-- Dashboard JS -->
<script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/analytics-demo.js') }}"></script>
<!-- Accordion Script -->
<script>
    $('.accordian-body').on('show.bs.collapse', function () {
        $(this)
            .closest("table")
            .find(".collapse.show")
            .not(this)
            .collapse('hide');
    });
</script>


<!--  
<script>
const cookieBox = document.querySelector(".wrapper"),
      buttons = document.querySelectorAll(".button");

// Function to check and show cookie consent
const executeCodes = () => {
  // If cookie already exists, don't show the popup
  if (document.cookie.includes("cookieBy")) return;

  cookieBox.classList.add("show"); 

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      cookieBox.classList.remove("show");

      // Set a cookie for 30 days for both accept and decline
      document.cookie = "cookieBy=seen; max-age=" + 60 * 60 * 24 * 30;
    });
  });
};

// Run on page load
window.addEventListener("load", executeCodes);
</script> -->




</body>



</html>