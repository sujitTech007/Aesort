@php

$pageTitle = $pageTitle ?? 'Service-Detail – Aesort';

$currentPage = $currentPage ?? 'services';

@endphp

@include('include.header')


<!-- Single Service Page Start -->
<div class="service_detail_page py-5">    
	<div class="container">
		<div class="row align-items-center g-4 g-lg-5">			
			<div class="col-lg-6">
				<div class="service-hero-content">
					<div class="service-hero-badge mb-3">
						<i class="fa-solid fa-leaf me-2"></i>
						{{ $service->short_description }}
					</div>

					<h1 class="mb-2 fs-1 text-anime">
						{{ $service->title }}
					</h1>

					<p class="service-hero-description mb-4">
							{!! $service->description !!}
					</p>

					

					<!-- Buttons -->
					<div class="d-flex flex-wrap align-items-center">

						<a href="{{ url('/contact') }}"
							class="btn btn-success rounded-pill px-4 py-2">
							Get in Touch
							<i class="fa-solid fa-arrow-right ms-2"></i>
						</a>                           

					</div>

				</div>
			</div>


                <!-- Image -->
			<div class="col-lg-6">
				<div class="service-hero-image position-relative">
					<figure class="mb-0">
						<img src="{{ asset('uploads/service-images/' . $service->banner_image) }}"
								alt="{{ $service->title }}"
								class="w-100">
					</figure>
				</div>
            </div>

        </div>

		<div class="row my-5">
			<div class="service-whyus mb-5">

				<div class="d-flex align-items-center gap-2 mb-3">
					<span class="service-section-icon">
						<i class="fa-solid fa-leaf"></i>
					</span>

					<span class="text-success fw-semibold">
						Why Us?
					</span>

					<span class="service-section-line"></span>
				</div>

				<div class="row align-items-center g-4">

					<div class="col-lg-7">

						<h2 class="fw-bold mb-3 text-anime">
							Your Partner in 
							<span class="text-success">Building Energy Intelligence</span>
						</h2>

						<p class="mb-0">
							AESORT helps commercial and institutional building teams understand energy performance, identify opportunities for improvement, and make data-informed decisions through connected energy insights and analytics.
						</p>

					</div>

					<div class="col-lg-5">

						<div class="service-stats d-flex justify-content-around text-center">

							<div>
								<i class="fa-solid fa-leaf text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1">99%</h4>
								<small>Data Accuracy</small>
							</div>

							<div>
								<i class="fa-regular fa-clock text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1">24/7</h4>
								<small>Real-Time Monitoring</small>
							</div>

							<div>
								<i class="fa-solid fa-cloud text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1">Lower</h4>
								<small>Carbon Footprint</small>
							</div>

						</div>

					</div>

				</div>

			</div>
			
		</div>

		<div class="row">
				<div class="service-benefits">

					<div class="service-benefits-title mb-4">

						<div class="d-flex align-items-center gap-2 mb-2">

							<span class="service-section-icon">
								<i class="fa-solid fa-leaf"></i>
							</span>

							<span class="text-success fw-semibold">
								Benefits of AESORT
							</span>

						</div>

					</div>


					<div class="row g-4">

						<!-- Benefit 1 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-solar-panel"></i>
								</div>

								<h3 class="h5 fw-bold">
									Actionable Energy Insights
								</h3>

								<p class="mb-0">
									Turn building energy data into clear insights that support informed operational decisions.
								</p>

								
							</div>

						</div>


						<!-- Benefit 2 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-coins"></i>
								</div>

								<h3 class="h5 fw-bold">
									Improved Energy Efficiency
								</h3>

								<p class="mb-0">
									Identify opportunities to improve energy performance and reduce unnecessary consumption.
								</p>

								
							</div>

						</div>


						<!-- Benefit 3 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-gears"></i>
								</div>

								<h3 class="h5 fw-bold">
Better Decision-Making								</h3>

								<p class="mb-0">
									Use relevant data and trends to prioritize energy and operational improvements.
								</p>

								
							</div>

						</div>


						<!-- Benefit 4 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-chart-line"></i>
								</div>

								<h3 class="h5 fw-bold">
									Proactive Monitoring
								</h3>

								<p class="mb-0">
									Monitor energy performance and identify changes that may require further attention.
								</p>

								
							</div>

						</div>


						<!-- Benefit 5 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-wrench"></i>
								</div>

								<h3 class="h5 fw-bold">
Operational Visibility								</h3>

								<p class="mb-0">
									Gain a clearer view of energy performance across connected building systems and operations.
								</p>

								
							</div>

						</div>


						<!-- Benefit 6 -->
						<div class="col-lg-4 col-md-6">

							<div class="benefits-item p-4 border rounded-4">

								<div class="icon-box">
									<i class="fa-solid fa-leaf"></i>
								</div>

								<h3 class="h5 fw-bold">
									Sustainability Support
								</h3>

								<p class="mb-0">
Support building efficiency initiatives and longer-term energy and sustainability goals.								</p>

								
							</div>

						</div>

					</div>

				</div>
		</div>

		<div class="service-features mt-5">
    <div class="row align-items-center">

        <!-- Image -->
        <div class="col-md-6">
            <div class="service-feature-image">
                <figure class="image-anime mb-0 rounded-4 overflow-hidden">
                    <img src="{{ asset('assets/images/planning.jpg') }}"
                        class="img-fluid w-100"
                        alt="Planning & Strategy">
                </figure>
            </div>
        </div>

        <!-- Content -->
        <div class="col-md-6">
            <div class="service-feature-content">

			<div class="service-hero-badge mb-3">
                            <i class="fa-solid fa-leaf me-2"></i>
                            Smart Energy Planning
                        </div>

              

                <h2 class="mb-3 text-anime">Planning &amp; Strategy</h2>

                <p class="text-muted mb-4">
                    Empowering commercial and institutional building teams with data-informed energy planning and practical strategies that support efficiency, operational improvements, and long-term sustainability.
                </p>

                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-start gap-3 mb-3">
                        Data-informed energy planning and analysis
                    </li>

                    <li class="d-flex align-items-start gap-3 mb-3">
                       Strategies aligned with building and operational needs
                    </li>

                    <li class="d-flex align-items-start gap-3 mb-3">
                        Identify opportunities to improve energy efficiency
                    </li>

                    <li class="d-flex align-items-start gap-3">
                       Practical approaches for long-term energy performance
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>

<!-- FAQs Section -->

<div class="latest-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">FAQs</h3>
                    <h2 class="text-anime">Frequently Asked Questions</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <section class="faq-container">

            <div class="faq-item">
                <button class="faq-question">
                    What does AESORT’s energy management platform do?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    AESORT helps businesses monitor, analyze, and optimize their energy
                    consumption using available energy data, advanced analytics, and
                    actionable insights. The platform helps identify inefficiencies and
                    opportunities to improve energy performance.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    How does AESORT identify energy-saving opportunities?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    AESORT analyzes available and historical energy data to identify
                    consumption patterns, inefficiencies, and unusual usage. The platform
                    then provides insights and recommendations to help businesses make
                    informed energy-management decisions.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    What utilities can AESORT monitor?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    AESORT provides a holistic view of resource consumption, including
                    electricity, gas, and water. This gives businesses greater visibility
                    into their overall resource usage and efficiency.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Is AESORT suitable for different types of commercial businesses?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Yes. AESORT is designed to support a range of commercial sectors,
                    including hospitality, retail, offices, educational institutions,
                    recreational facilities, and warehouses. Solutions can be adapted to
                    the specific requirements of each business.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    Can AESORT integrate with existing building systems?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Yes. AESORT is designed to integrate with existing infrastructure,
                    including building management systems, energy management systems,
                    IoT devices, and other compatible technologies.
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    What insights can businesses access through AESORT?
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    Businesses can access energy usage data, historical usage patterns,
                    reporting and analytics, and actionable recommendations. These insights
                    help teams understand performance, identify areas for improvement, and
                    make more informed energy decisions.
                </div>
            </div>

        </section>


    </div>
</div>

</div>
<div class="footer-ticker">

	<div class="scrolling-ticker">

		<div class="scrolling-ticker-box">

			<div class="scrolling-content">

				<span>Optimize Your Energy Usage</span>

				<span>Maximize Commercial Savings</span>

				<span>Powering a Greener Future</span>

				<span>Smart Energy, Smart Business</span>

				<span>Reliable 24×7 Monitoring</span>



			</div>



			<div class="scrolling-content">

				<span>Optimize Your Energy Usage</span>

				<span>Maximize Commercial Savings</span>

				<span>Powering a Greener Future</span>

				<span>Smart Energy, Smart Business</span>

				<span>Reliable 24×7 Monitoring</span>



			</div>

		</div>

	</div>

</div>
<script>
    const faqs = document.querySelectorAll(".faq-item");

    faqs.forEach((faq) => {
        faq.querySelector(".faq-question").addEventListener("click", () => {
            faqs.forEach((item) => {
                if (item !== faq) item.classList.remove("active");
            });
            faq.classList.toggle("active");
        });
    });
</script>

<script>
    const phoneInput = document.querySelector('[name="phone"]');

    phoneInput.addEventListener('input', function() {

        this.value = this.value.replace(/\D/g, '');

        if (this.value.length > 12) {
            this.value = this.value.slice(0, 12);
        }
    });
</script>


@include('include.footer')