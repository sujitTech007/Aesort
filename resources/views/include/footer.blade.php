<!-- Footer Ticker End -->



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

								<p>55 Village Centre Place, Suite 200, Mississauga, ON L4Z1V9</p>
								<!--<p>Suite 301, 231 Oak Park Blvd, Oakville, ON L6H 7S8</p>-->

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

							</div>

@php 
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
										
										<li><a href="{{ route('cookies.policy') }}">Cookie Policy</a></li>

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
	
	
    <div class="wrapper">
  <header>
    <i class="bx bx-cookie"></i>
    <h2>Cookies Consent</h2>
  </header>

  <div class="data">
    <p>This website uses cookies to help you have a superior and more relevant browsing experience on the website. <a href="{{ route('cookies.policy') }}"> Read more...</a></p>
  </div>

  <div class="buttons">
    <button class="button" id="acceptBtn">Accept</button>
    <button class="button" id="declineBtn">Decline</button>
  </div>
</div>
    
    
    
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
</script>


	<!-- Footer End -->



	<!-- Jquery Library File -->

	<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

	<!-- Bootstrap js file -->

	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


	<!-- Validator js file -->

	<script src="{{ asset('assets/js/validator.min.js') }}"></script>

	<!-- SlickNav js file -->

	<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>

	<!-- Swiper js file -->

	<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

	<!-- Counter js file -->

	<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>

	<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

	<!-- Magnific js file -->

	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

	<!-- SmoothScroll -->

	<script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>

	<!-- Parallax js -->

	<script src="{{ asset('assets/js/parallaxie.js') }}"></script>

	<!-- MagicCursor js file -->

	<script src="{{ asset('assets/js/gsap.min.js') }}"></script>

	<script src="{{ asset('assets/js/magiccursor.js') }}"></script>

	<!-- Text Effect js file -->

	<script src="{{ asset('assets/js/splitType.js') }}"></script>

	<script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>

	<!-- YTPlayer js file -->

	<script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>

	<!-- Wow js file -->

	<script src="{{ asset('assets/js/wow.js') }}"></script>

	<!-- Main Custom js file -->

	<script src="{{ asset('assets/js/function.js') }}"></script>

	<script src="{{ asset('assets/js/theme-panel.js') }}"></script>
	@if(Route::is('login') || Route::is('signup') || Route::is('password.request'))
		<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
		<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
	
</script>
@endif




</body>

</html>