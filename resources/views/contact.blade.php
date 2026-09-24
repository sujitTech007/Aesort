@php
$pageTitle = $pageTitle ?? 'Contact – Aesort';
$currentPage = $currentPage ?? 'contact';
@endphp
@include('include.header')

<!-- Wrapper Box Start -->
<div class="contact-wrapper-box">
    <div class="row g-0">

        <!-- LEFT SIDE -->
        <div class="col-lg-5">
            <div class="contact-info-panel">

                <span class="contact-small-title">GET IN TOUCH</span>
                <h2>Let's Start a Conversation</h2>
                <p class="contact-intro">
                    Have questions or want to discuss your energy needs?
                    Our team is here to help.
                </p>

                <!-- Address -->
                <div class="contact-info-item">
                    <div class="contact-icon-box">
                        <i class="fa-solid fa-location-dot contact-fa-icon"></i>
                    </div>

                    <div class="contact-info-content">
                        <span>Our Address</span>
                        <p>
                            55 Village Centre Place, Suite 200,<br>
                            Mississauga, ON L4Z1V9
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="contact-info-item">
                    <div class="contact-icon-box">
                        <i class="fa-solid fa-envelope contact-fa-icon"></i>
                    </div>

                    <div class="contact-info-content">
                        <span>Email Us</span>
                        <p>
                            <a href="mailto:info@aesort.ca">info@aesort.ca</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-7">
            <div class="contact-form-box">

                <div class="section-title text-start mb-4">
                    <h3>Contact Now</h3>
                    <h2>Get In Touch With Us</h2>
                </div>

                <form id="contactForm" action="#" method="POST">

                    <div class="row">

                        <div class="form-group col-md-6 mb-3">
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Name"
                                   required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Email"
                                   required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Phone"
                                   required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input type="text"
                                   name="subject"
                                   class="form-control"
                                   placeholder="Subject"
                                   required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input type="text"
                                   name="company"
                                   class="form-control"
                                   placeholder="Company / Organization"
                                   required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <select name="industry"
                                    class="form-control"
                                    required>
                                <option value="" selected disabled>
                                    Industry
                                </option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Retail">Retail</option>
                                <option value="Educational Institution">
                                    Educational Institution
                                </option>
                                <option value="Office">Office</option>
                                <option value="Recreational Facility">
                                    Recreational Facility
                                </option>
                                <option value="Warehouse">Warehouse</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <select name="interest"
                                    class="form-control"
                                    required>
                                <option value="" selected disabled>
                                    What are you interested in?
                                </option>
                                <option value="Energy Monitoring">
                                    Energy Monitoring
                                </option>
                                <option value="Energy Optimization">
                                    Energy Optimization
                                </option>
                                <option value="Consulting & Advisory">
                                    Consulting & Advisory
                                </option>
                                <option value="Data Insights & Analytics">
                                    Data Insights & Analytics
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <textarea name="msg"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Write a Message"
                                      required></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="submit"
                                    class="btn-default contact-submit-btn">
                                Request a Consultation
                                <i class="fa-solid fa-arrow-right contact-btn-icon"></i>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

    </div>
</div>



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