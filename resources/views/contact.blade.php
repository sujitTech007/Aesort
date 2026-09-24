@php
$pageTitle = $pageTitle ?? 'Contact – Aesort';
$currentPage = $currentPage ?? 'contact';
@endphp
@include('include.header')
<!-- Page Header Start -->
<div class="page-header parallaxie">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Page Header Box Start -->
				<div class="page-header-box">
					<h1 class="text-anime">Contact us</h1>
					<nav class="wow fadeInUp" data-wow-delay="0.25s">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
							<li class="breadcrumb-separator">/</li>

							<li class="breadcrumb-item active" aria-current="page">Contact us</li>
						</ol>
					</nav>
				</div>
				<!-- Page Header Box End -->
			</div>
		</div>
	</div>
</div>
<!-- Page Header End -->
<!-- Wrapper Box Start -->
<div class="contact-wrapper-box" style="padding: 0px 150px 0px 150px;border:1px solid #e5e5e5;border-radius:15px;/* box-shadow:0px 8px 22px rgba(0,0,0,0.08); *//* margin-top:50px; */">

    <div class="row">

        <!-- LEFT 6/6 COLUMN -->
        <div class="col-lg-6 col-md-12">

            <div class="contact-information">
                <div class="container-fluid" >
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="wow fadeInUp">Contact Details</h3>
                                <h2 class="text-anime">Happy to Answer All Your Questions</h2>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">

                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                               
                                <div class="contact-info-content">
                                    <h3>Our Addresses:</h3>
                                    <p>55 Village Centre Place, Suite 200, Mississauga, ON L4Z1V9</p>
                                </div>
                                <div class="contact-icon">
                                    <img src="assets/images/icon-location.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                              
                                <div class="contact-info-content">
                                    <h3>Emails:</h3>
                                    <p>info@aesortenergy.com<br>Support@aesortenergy.com</p>
                                </div>
                                <div class="contact-icon">
                                    <img src="assets/images/icon-mail.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.75s">
                               
                                <div class="contact-info-content">
                                    <h3>Phones:</h3>
                                    <p>(+0) 123 456 789<br>(+1) 456 123 789</p>
                                </div>
                                <div class="contact-icon">
                                    <img src="assets/images/icon-phone.svg" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT 6/6 COLUMN -->
        <div class="col-lg-6 col-md-12">

            <div class="container-fluid" style="padding:0;">
                <div class="contact-form-box">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Contact Now</h3>
                        <h2 class="text-anime">Get In Touch With Us</h2>
                    </div>

                    <div class="contact-form wow fadeInUp" data-wow-delay="0.75s">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator">
                            <div class="row">

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Write a Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn-default">Submit Now</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- Wrapper Box End -->


<!-- Footer Ticker Start -->
<div class="footer-ticker">
	<div class="scrolling-ticker">
		<div class="scrolling-ticker-box">
			<div class="scrolling-content">
				<span>Generate Your Own Power</span>
				<span>Reap the Returns</span>
				<span>Heal the World</span>
				<span>Efficiency & Power</span>
				<span>24*7 Support</span>
			</div>

			<div class="scrolling-content">
				<span>Generate Your Own Power</span>
				<span>Reap the Returns</span>
				<span>Heal the World</span>
				<span>Efficiency & Power</span>
				<span>24*7 Support</span>
			</div>
		</div>
	</div>
</div>
<!-- Footer Ticker End -->
</div>
</div>
</div>
<!-- Footer Ticker End -->
<style>
	.contact-wrapper-box {
    background: #fff;
}

</style>
@include('include.footer')