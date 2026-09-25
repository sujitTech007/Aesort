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
							Your Trusted Partner in
							<span class="text-success">Real-Time Energy Intelligence</span>
						</h2>

						<p class="mb-0">
							Solution empowers businesses to track energy usage in real-time.
							By providing instant visibility into consumption patterns, it helps
							identify inefficiencies, reduce costs, and achieve sustainability goals.
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
								Benefits of Solar Energy
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
									Instant Energy Insights
								</h3>

								<p class="mb-0">
									Real-time data provides immediate visibility into energy
									consumption patterns.
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
									Reduced Energy Costs
								</h3>

								<p class="mb-0">
									By monitoring and adjusting energy usage in real-time,
									businesses save costs.
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
									Easy Installation
								</h3>

								<p class="mb-0">
									AESORT supports flexible deployment based on site requirements,
									connected systems, and monitoring needs.
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
									Better Decision-Making
								</h3>

								<p class="mb-0">
									Access insights and historical trends to make smarter
									business decisions.
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
									Proactive Maintenance
								</h3>

								<p class="mb-0">
									Detect issues early and reduce downtime with smart monitoring.
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
									Improved Sustainability
								</h3>

								<p class="mb-0">
									Reduce carbon footprint and align with environmental goals.
								</p>

								
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
                    Empowering industries with intelligent planning and energy
                    strategies that improve efficiency, reduce costs, and support
                    long-term sustainability.
                </p>

                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-start gap-3 mb-3">
                        Research-driven energy planning and analysis
                    </li>

                    <li class="d-flex align-items-start gap-3 mb-3">
                        Customized energy solutions and strategies
                    </li>

                    <li class="d-flex align-items-start gap-3 mb-3">
                        Identify opportunities to improve energy efficiency
                    </li>

                    <li class="d-flex align-items-start gap-3">
                        Practical strategies for long-term cost savings
                    </li>
                </ul>

            </div>
        </div>

    </div>
</div>

<div class="faq-box">

						<div class="text-center mb-4 mb-lg-5">
							<div class="service-hero-badge mb-3">
						<i class="fa-solid fa-leaf me-2"></i>
						FAQs
					</div>
							

							<h2 class="text-anime mb-2">
								Frequently Asked Questions
							</h2>

							<p class="text-muted mb-0">
								Find answers to common questions about renewable energy,
								energy efficiency, and sustainable solutions.
							</p>
						</div>

						<!-- FAQ Accordion Start -->
						<div class="faq-accordion">
							<div class="accordion" id="faq_accordion">

								<!-- FAQ 1 -->
								<div class="accordion-item">
									<h2 class="accordion-header" id="heading1">
										<button
											class="accordion-button"
											type="button"
											data-bs-toggle="collapse"
											data-bs-target="#collapse1"
											aria-expanded="true"
											aria-controls="collapse1">
											<span class="faq-number">01</span>
											Understanding Renewable Energy: A Beginner's Guide
										</button>
									</h2>

									<div id="collapse1"
										class="accordion-collapse collapse show"
										aria-labelledby="heading1"
										data-bs-parent="#faq_accordion">

										<div class="accordion-body">
											Renewable energy is energy that comes from natural
											sources that are constantly replenished, such as
											sunlight, wind, rain, and geothermal heat. Unlike
											fossil fuels, renewable energy produces little to no
											pollution, making it a clean and sustainable option
											for the future.
										</div>
									</div>
								</div>

								<!-- FAQ 2 -->
								<div class="accordion-item">
									<h2 class="accordion-header" id="heading2">
										<button
											class="accordion-button collapsed"
											type="button"
											data-bs-toggle="collapse"
											data-bs-target="#collapse2"
											aria-expanded="false"
											aria-controls="collapse2">
											<span class="faq-number">02</span>
											The Basics of Tidal and Wave Energy
										</button>
									</h2>

									<div id="collapse2"
										class="accordion-collapse collapse"
										aria-labelledby="heading2"
										data-bs-parent="#faq_accordion">

										<div class="accordion-body">
											Tidal and wave energy are forms of renewable energy
											that harness the power of the ocean to generate
											electricity. Tidal energy is produced by the rise and
											fall of ocean tides, while wave energy uses the
											movement of ocean waves.
										</div>
									</div>
								</div>

								<!-- FAQ 3 -->
								<div class="accordion-item">
									<h2 class="accordion-header" id="heading3">
										<button
											class="accordion-button collapsed"
											type="button"
											data-bs-toggle="collapse"
											data-bs-target="#collapse3"
											aria-expanded="false"
											aria-controls="collapse3">
											<span class="faq-number">03</span>
											Educating for a Sustainable Future
										</button>
									</h2>

									<div id="collapse3"
										class="accordion-collapse collapse"
										aria-labelledby="heading3"
										data-bs-parent="#faq_accordion">

										<div class="accordion-body">
											Educating for a sustainable future means developing
											the knowledge, skills, and values needed to protect
											our environment and use resources responsibly. It
											includes awareness of climate change, pollution,
											renewable energy, and responsible consumption.
										</div>
									</div>
								</div>

								<!-- FAQ 4 -->
								<div class="accordion-item">
									<h2 class="accordion-header" id="heading4">
										<button
											class="accordion-button collapsed"
											type="button"
											data-bs-toggle="collapse"
											data-bs-target="#collapse4"
											aria-expanded="false"
											aria-controls="collapse4">
											<span class="faq-number">04</span>
											Resources and Further Reading on Renewable Energy
										</button>
									</h2>

									<div id="collapse4"
										class="accordion-collapse collapse"
										aria-labelledby="heading4"
										data-bs-parent="#faq_accordion">

										<div class="accordion-body">
											Staying informed about renewable energy helps us
											understand how we can move toward a cleaner and more
											sustainable future. Reliable resources include
											government websites, scientific journals, online
											courses, and energy-focused publications.
										</div>
									</div>
								</div>

							</div>
						</div>
						
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


@include('include.footer')