@php

$pageTitle = $pageTitle ?? 'Service-Detail – Aesort';

$currentPage = $currentPage ?? 'services';

@endphp

@include('include.header')

<!-- Page Header Start -->

<div class="page-header parallaxie">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<!-- Page Header Box Start -->

				<div class="page-header-box">

					<h1 class="text-anime"> {{ $service->title }}</h1>

					<nav class="wow fadeInUp" data-wow-delay="0.25s">

						<ol class="breadcrumb">

							<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

							<li class="breadcrumb-separator">/</li>







							<li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>

						</ol>

					</nav>

				</div>

				<!-- Page Header Box End -->

			</div>

		</div>

	</div>

</div>

<!-- Page Header End -->





<!-- Page Header End -->



<!-- Single Service Page Start -->

<div class="page-service-single ">

	<div class="container">

		<div class="row left-bar">

			<div class="col-lg-4">

				<div class="service-sidebar">

					@php

					$service_lists = App\Models\Service::where('status', 1)->get();

					@endphp

					<!-- Service List Box Start -->

					<div class="services-list-box wow fadeInUp">

						<ul>

							@foreach($service_lists as $serv)



							<li><a href="{{ route('service.detail', $serv->slug ) }}">{{ $serv->title }}</a></li>



							@endforeach

						</ul>

					</div>

					<!-- Service List Box End -->



					<!-- Sidebar CTA Box Start -->

					<div class="sidebar-cta-box wow fadeInUp">

						<div class="cta-image">

							<figure class="image-anime">

								<img src="{{ asset('assets/images/service-cta.jpg') }}" alt="" class="prfsnal-img">

							</figure>

						</div>



						<div class="cta-content">

							<div class="cta-icon">

								<img src="{{ asset('assets/images/icon-phone.svg') }}" alt="">

							</div>





							<h3>Get Professional Help</h3>

							<p>(+0) 123 456 789</p>

						</div>

					</div>

					<!-- Sidebar CTA Box End -->

				</div>

			</div>



			<div class="col-lg-8">

				<!-- Service Content Start -->

				<div class="service-content">

					<!-- Service Featured Image Start -->

					<div class="service-featured-image">

						<figure class="image-anime h-100">

							<img src="{{ asset('uploads/service-images/' . $service->banner_image) }}" alt="{{ $service->title }}">

						</figure>

					</div>

					<!-- Service Featured Image End -->



					<!-- Service Entry Content Start -->

					<div class="service-entry">
						<h2 class="text-anime"> {{ $service->title }}</h2>

						<p>{{ $service->short_description }}</p>



					</div>

					<!-- Service Entry Content End -->



					<!-- Why Us Start -->

					<div class="service-whyus">

						{!! $service->description !!}

						<!-- Service Video Box End-->

					</div>

					<!-- Why Us End -->







				</div>

				<!-- Service Content End -->

			</div>

		</div>

	</div>

</div>


<div class="page-service-single bottom-servce">
	<div class="container">
		<div class="row">


			<div class="col-lg-12">
				<!-- Service Content Start -->
				<div class="service-content">
					<!-- Service Featured Image Start -->

					<!-- Service Featured Image End -->

					<!-- Service Entry Content Start -->

					<!-- Service Entry Content End -->

					<!-- Why Us Start -->
					<div class="service-whyus">

						<h2 class="text-anime">
							<div class="line" style="display: block; text-align: start; width: 100%;">
								<div class="line" style="display: inline-block; text-align: start; width: 100%; position: relative;">
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">W</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">h</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">y</div>
											</div>
										</div>
									</div>
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">U</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div>
											</div>
										</div>
									</div>
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">!</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</h2>
						<p> Solution empowers businesses to track energy usage in real-time. By providing instant visibility into
							consumption patterns, it helps identify inefficiencies, reduce costs, and achieve sustainability goals.</p>

						<!-- Service Video Box Start -->

						<!-- Service Video Box End-->
					</div>
					<!-- Why Us End -->

					<!-- Service Benifits Start -->
					<div class="service-benefits">
						<div class="row">
							<div class="col-md-12">
								<div class="service-benefits-title">

									<h2 class="text-anime">
										<div class="line" style="display: block; text-align: start; width: 100%;">
											<div class="line" style="display: inline-block; text-align: start; width: 100%; position: relative;">
												<div class="word" style="display: inline-block; position: relative;">
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">B</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">f</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">i</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div>
														</div>
													</div>
												</div>
												<div class="word" style="display: inline-block; position: relative;">
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">o</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">f</div>
														</div>
													</div>
												</div>
												<div class="word" style="display: inline-block; position: relative;">
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">S</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">o</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">l</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">a</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">r</div>
														</div>
													</div>
												</div>
												<div class="word" style="display: inline-block; position: relative;">
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">E</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">r</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">g</div>
														</div>
													</div>
													<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
														<div class="word" style="display: inline-block;">
															<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">y</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</h2>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-1.svg') }}" alt="">
									</div>
									<h3>Instant Energy Insights</h3>
									<p>Real-time data provides immediate visibility into energy consumption patterns.</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-2.svg') }}" alt="">
									</div>
									<h3>Reduced Energy Costs</h3>
									<p>By monitoring and adjusting energy usage in real-time, businesses save costs.</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-3.svg') }}" alt="">
									</div>
									<h3>Easy Installation</h3>
									<p> AESORT supports flexible deployment based on site requirements,
    connected systems, and monitoring needs.</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-4.svg') }}" alt="">
									</div>
									<h3>Better Decision-Making</h3>
									<p>Access insights and historical trends to make smarter business decisions.</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-5.svg') }}" alt="">
									</div>
									<h3>Proactive Maintenance</h3>
									<p>Detect issues early and reduce downtime with smart monitoring.</p>
								</div>
							</div>

							<div class="col-lg-4 col-md-6">
								<div class="benefits-item">
									<div class="icon-box">
										<img src="{{ asset('assets/images/icon-benefits-6.svg') }}" alt="">
									</div>
									<h3>Improved Sustainability</h3>
									<p>Reduce carbon footprint and align with environmental goals.</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Service Benifits End -->

					<!-- Service Features List Start -->
					<div class="service-features">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="service-feature-image">
									<figure class="image-anime">
										<img src="{{ asset('assets/images/planning.jpg') }}" alt="">
									</figure>
								</div>
							</div>

							<div class="col-md-6">
								<div class="service-feature-content">
									<h2>Planning &amp; Strategy</h2>
									<p>Empowers industries through intelligent planning &amp; energy strategies.</p>
									<ul>
										<li>Research beyond the business plan</li>
										<li>Marketing options and rates</li>
										<li>The ability to turnaround consulting</li>
										<li>It was popularised in the 1960s with the.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Service Features List End -->

					<!-- FAQs Start -->
					<div class="faq-box">


						<!-- FAQ Accordion Start -->
						<h2 class="text-anime">
							<div class="line" style="display: block; text-align: start; width: 100%;">
								<div class="line" style="display: inline-block; text-align: start; width: 100%; position: relative;">
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">F</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">r</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">q</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">u</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">l</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">y</div>
											</div>
										</div>
									</div>
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">A</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">k</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">d</div>
											</div>
										</div>
									</div>
									<div class="word" style="display: inline-block; position: relative;">
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">Q</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">u</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">e</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">t</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">i</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">o</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">n</div>
											</div>
										</div>
										<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px); position: relative;">
											<div class="word" style="display: inline-block;">
												<div class="char" style="display: inline-block; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">s</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</h2>
						<div class="faq-accordion">
							<div class="accordion" id="faq_accordion">
								<div class="accordion-item">
									<h2 class="accordion-header" id="heading1"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Understanding Renewable Energy: A Beginners Guide? </button></h2>

									<div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faq_accordion">
										<div class="accordion-body">
											<p>Renewable energy is energy that comes from natural sources that are constantly replenished, such as sunlight, wind, rain, and geothermal heat. Unlike fossil fuels, renewable energy does not run out and produces little to no pollution, making it a clean and sustainable option for the future.</p>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="heading2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">The Basics of Tidal and Wave Energy?</button></h2>

									<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faq_accordion">
										<div class="accordion-body">
											<p>Tidal and wave energy are forms of renewable energy that harness the power of the ocean to generate electricity. Tidal energy is produced by the rise and fall of ocean tides, which occur due to the gravitational pull of the moon and sun.</p>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="heading3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Educating for a Sustainable Future?</button></h2>

									<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faq_accordion">
										<div class="accordion-body">
											<p>Educating for a sustainable future means teaching people the knowledge, skills, and values needed to protect our environment and use resources wisely. It involves raising awareness about issues like climate change, pollution, renewable energy, and responsible consumption.</p>
										</div>
									</div>
								</div>

								<div class="accordion-item">
									<h2 class="accordion-header" id="heading4"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Staying Informed: Resources and Further Reading on Renewable Energy?</button></h2>

									<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faq_accordion">
										<div class="accordion-body">
											<p>Staying informed about renewable energy is key to understanding how we can transition to a cleaner, more sustainable world. There are many reliable resources available for further reading, including government websites, scientific journals, online courses, and energy-focused blogs.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- FAQ Accordion End -->
					</div>
					<!-- FAQs End -->
				</div>
				<!-- Service Content End -->
			</div>
		</div>
	</div>
</div>

<!-- Single Service Page End -->

<!-- Footer Ticker Start -->

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