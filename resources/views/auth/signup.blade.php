@php
	$pageTitle = $pageTitle ?? 'SignUp – Aesort';
	$currentPage = $currentPage ?? 'signup';
@endphp

@include('include.header')

<div class="why-chooseus-layout2">

		<div class="container-fluid">

			<div class="row no-gap row-equal-height">

				<div class="col-lg-6">

					<!-- Why Choose us Image Box Start -->

					<div class="why-choose-us-img-box">

						<div class="video-play-button">

							<a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video">

								<img src="images/play-green.svg" alt="">

							</a>

						</div>

					</div>

				</div>

<div class="col-lg-6">

	<div class="contact-form-box">

		<div class="section-title">

			<h2 class="text-anime wow fadeInUp">Sign Up</h2>

		</div>



		<div class="contact-form wow fadeInUp" data-wow-delay="0.75s">

			<form id="signupForm" action="{{ route('register.perform') }}" method="POST">

				@csrf

				<div class="row">



					<!-- Name -->

					<div class="form-group col-md-12 mb-4">

						<input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" required>

						<div class="help-block with-errors"></div>

						@error('name')

							<small class="text-danger mt-1">{{ $message }}</small>

						@enderror

					</div>



					<!-- Email -->

					<div class="form-group col-md-12 mb-4">

						<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>

						<div class="help-block with-errors"></div>

						@error('email')

							<small class="text-danger mt-1">{{ $message }}</small>

						@enderror

					</div>



					<!-- Phone -->

					<div class="form-group col-md-12 mb-4">
                        <div class="d-flex gap-2 align-items-center">

				
 
						<input type="text" 
						   name="phone" 
						   class="form-control" 
						   id="phone" 
						   placeholder="Phone Number ( without country code )" 
						   value="{{ old('phone') }}" 
						   required 
						   pattern="[0-9]{10}" 
						   maxlength="10"
						   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
	   
						<div class="help-block with-errors"></div>

						@error('phone')

							<small class="text-danger mt-1">{{ $message }}</small>

						@enderror

					</div>
                    </div>


					<!-- Password -->

						<div class="form-group col-md-12 mb-4" style="position: relative;">

						<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>

						<span toggle="#password" class="fa fa-eye field-icon toggle-password"

							style="position:absolute; right:25px; top:50%; transform:translateY(-50%); cursor:pointer;"></span>

						<div class="help-block with-errors"></div>

						@error('password')

							<small class="text-danger mt-1">{{ $message }}</small>

						@enderror

					</div>



					<!-- Confirm Password -->

						<div class="form-group col-md-12 mb-4" style="position: relative;">

						<input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>

						<span toggle="#confirmPassword" class="fa fa-eye field-icon toggle-password"

							style="position:absolute; right:25px; top:50%; transform:translateY(-50%); cursor:pointer;"></span>

					</div>



					<!-- Signup Button -->

					<div class="col-md-12 text-center mb-3">

						<button type="submit" class="btn-default">Sign Up</button>

					</div>



					<!-- Already have account -->

					<div class="col-md-12 text-center">

						<p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

					</div>



				</div>

			</form>

		</div>

	</div>

</div>



<!-- FontAwesome for Eye Icon -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



<script>

	// Toggle show/hide password for multiple fields

	document.addEventListener("DOMContentLoaded", function () {

		document.querySelectorAll(".toggle-password").forEach(function (icon) {

			icon.addEventListener("click", function () {

				const input = document.querySelector(this.getAttribute("toggle"));

				const type = input.getAttribute("type") === "password" ? "text" : "password";

				input.setAttribute("type", type);

				this.classList.toggle("fa-eye-slash");

			});

		});

	});

</script>





			</div>

		</div>

	</div>

@include('include.footer')