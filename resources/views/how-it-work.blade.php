@php $pageTitle = 'How It Works – Aesort'; $currentPage = 'how-it-works'; @endphp @include('include.header') <!-- How It Works Page Start -->
<div class="service_detail_page py-5">
	<div class="container"> <!-- Hero Section -->
		<div class="row align-items-center g-4 g-lg-5">
			<div class="col-lg-6">
				<div class="service-hero-content">
					<div class="service-hero-badge mb-3"> <i class="fa-solid fa-chart-line me-2"></i> Energy Intelligence </div>
					<h1 class="mb-2 fs-1 text-anime"> How AESORT Works </h1>
					<p class="service-hero-description mb-4"> AESORT helps commercial and institutional organizations understand how their buildings use energy, identify opportunities for improvement, and make informed energy-management decisions. </p>
					<div class="d-flex flex-wrap align-items-center"> <a href="{{ url('/contact') }}" class="btn btn-success rounded-pill px-4 py-2"> Get Started <i class="fa-solid fa-arrow-right ms-2"></i> </a> </div>
				</div>
			</div> <!-- Image -->
			<div class="col-lg-6">
				<div class="service-hero-image position-relative">
					<figure class="mb-0"> <img src="{{ asset('assets/images/planning.jpg') }}" alt="AESORT Energy Intelligence" class="w-100"> </figure>
				</div>
			</div>
		</div> <!-- How It Works Overview -->
		<div class="row my-5">
			<div class="service-whyus mb-5">
				<div class="d-flex align-items-center gap-2 mb-3"> <span class="service-section-icon"> <i class="fa-solid fa-gears"></i> </span> <span class="text-success fw-semibold"> Our Process </span> <span class="service-section-line"></span> </div>
				<div class="row align-items-center g-4">
					<div class="col-lg-7">
						<h2 class="fw-bold mb-3 text-anime"> From Energy Data to <span class="text-success"> Practical Insights </span> </h2>
						<p class="mb-0"> AESORT brings together building, utility, operational, and connected-device information to create a clearer view of energy performance. The process helps teams move from fragmented information to useful insights and informed action. </p>
					</div>
					<div class="col-lg-5">
						<div class="service-stats d-flex justify-content-around text-center">
							<div> <i class="fa-solid fa-building text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1"> Sites </h4> <small> Building Visibility </small>
							</div>
							<div> <i class="fa-solid fa-chart-line text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1"> Data </h4> <small> Energy Insights </small>
							</div>
							<div> <i class="fa-solid fa-lightbulb text-success fs-3 mb-2"></i>
								<h4 class="fw-bold mb-1"> Action </h4> <small> Practical Decisions </small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- Process Steps -->
		<div class="row">
			<div class="service-benefits">
				<div class="service-benefits-title mb-4">
					<div class="d-flex align-items-center gap-2 mb-2"> <span class="service-section-icon"> <i class="fa-solid fa-list-check"></i> </span> <span class="text-success fw-semibold"> How It Works </span> </div>
					<h2 class="text-anime"> A Clear Path to Better Energy Management </h2>
					<p class="text-muted"> AESORT supports a structured process designed to help organizations understand energy performance and identify practical opportunities. </p>
				</div>
				<div class="row g-4"> <!-- Step 1 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-building"></i> </div>
							<h3 class="h5 fw-bold"> 01. Understand the Site </h3>
							<p class="mb-0"> AESORT starts by understanding the building, site characteristics, operational needs, available systems, and energy objectives. </p>
						</div>
					</div> <!-- Step 2 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-plug"></i> </div>
							<h3 class="h5 fw-bold"> 02. Connect & Collect </h3>
							<p class="mb-0"> Relevant energy and operational information can be collected through connected devices, available systems, utility information, or customer-provided data. </p>
						</div>
					</div> <!-- Step 3 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-database"></i> </div>
							<h3 class="h5 fw-bold"> 03. Organize the Data </h3>
							<p class="mb-0"> Available information is organized to create a clearer view of energy consumption, equipment performance, and operational trends. </p>
						</div>
					</div> <!-- Step 4 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-magnifying-glass-chart"></i> </div>
							<h3 class="h5 fw-bold"> 04. Analyze Performance </h3>
							<p class="mb-0"> Energy and operational data can be analyzed to identify patterns, unusual consumption, inefficiencies, and areas that may require further attention. </p>
						</div>
					</div> <!-- Step 5 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-lightbulb"></i> </div>
							<h3 class="h5 fw-bold"> 05. Identify Opportunities </h3>
							<p class="mb-0"> AESORT helps teams identify practical opportunities to improve energy performance, manage consumption, and support operational decision-making. </p>
						</div>
					</div> <!-- Step 6 -->
					<div class="col-lg-4 col-md-6">
						<div class="benefits-item p-4 border rounded-4">
							<div class="icon-box"> <i class="fa-solid fa-file-chart-column"></i> </div>
							<h3 class="h5 fw-bold"> 06. Report & Act </h3>
							<p class="mb-0"> Insights can be presented through dashboards, reports, analytics, and recommendations to help teams make informed energy-management decisions. </p>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- Data & Insights Section -->
		<div class="service-features mt-5">
			<div class="row align-items-center"> <!-- Image -->
				<div class="col-md-6">
					<div class="service-feature-image">
						<figure class="image-anime mb-0 rounded-4 overflow-hidden"> <img src="{{ asset('assets/images/planning.jpg') }}" class="img-fluid w-100" alt="Energy Data and Analytics"> </figure>
					</div>
				</div> <!-- Content -->
				<div class="col-md-6">
					<div class="service-feature-content">
						<div class="service-hero-badge mb-3"> <i class="fa-solid fa-chart-pie me-2"></i> Data & Insights </div>
						<h2 class="mb-3 text-anime"> Turning Energy Data Into Useful Information </h2>
						<p class="text-muted mb-4"> Energy information is most useful when it can be understood in context. AESORT brings together available data to help organizations review consumption, performance, and operational trends. </p>
						<ul class="list-unstyled mb-0">
							<li class="d-flex align-items-start gap-3 mb-3"> Energy consumption visibility </li>
							<li class="d-flex align-items-start gap-3 mb-3"> Historical and performance trends </li>
							<li class="d-flex align-items-start gap-3 mb-3"> Identification of potential inefficiencies </li>
							<li class="d-flex align-items-start gap-3"> Practical reporting and decision support </li>
						</ul>
					</div>
				</div>
			</div>
		</div> <!-- FAQ -->
		<div class="faq-box">
			<div class="text-center mb-4 mb-lg-5">
				<div class="service-hero-badge mb-3"> <i class="fa-solid fa-circle-question me-2"></i> FAQs </div>
				<h2 class="text-anime mb-2"> Frequently Asked Questions </h2>
				<p class="text-muted mb-0"> Learn more about how AESORT approaches energy monitoring, analysis, and energy-management decisions. </p>
			</div> <!-- FAQ Accordion Start -->
			<div class="faq-accordion">
				<div class="accordion" id="faq_accordion"> <!-- FAQ 1 -->
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading1"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1"> <span class="faq-number">01</span> What information does AESORT use? </button> </h2>
						<div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#faq_accordion">
							<div class="accordion-body"> Depending on the engagement, AESORT may use energy consumption, utility, equipment, operational, environmental, and other relevant site data that is available. </div>
						</div>
					</div> <!-- FAQ 2 -->
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading2"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2"> <span class="faq-number">02</span> Does AESORT require IoT devices? </button> </h2>
						<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#faq_accordion">
							<div class="accordion-body"> Not necessarily. The available approach depends on the customer's site, systems, objectives, and data sources. Data may come from connected devices, existing systems, utility information, or manual inputs where applicable. </div>
						</div>
					</div> <!-- FAQ 3 -->
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading3"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3"> <span class="faq-number">03</span> What does AESORT provide after analysis? </button> </h2>
						<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#faq_accordion">
							<div class="accordion-body"> Depending on the applicable service, AESORT may provide dashboards, energy performance information, reports, analytics, recommendations, and other agreed deliverables. </div>
						</div>
					</div> <!-- FAQ 4 -->
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading4"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4"> <span class="faq-number">04</span> Can AESORT support a Proof of Concept? </button> </h2>
						<div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#faq_accordion">
							<div class="accordion-body"> Yes. AESORT may provide a limited Proof of Concept where appropriate. The scope, duration, equipment, site access, data requirements, and success criteria can be defined in the applicable POC arrangement. </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- How It Works Page End --> <!-- Footer Ticker -->
<div class="footer-ticker">
	<div class="scrolling-ticker">
		<div class="scrolling-ticker-box">
			<div class="scrolling-content"> <span>Understand Your Energy</span> <span>Monitor Building Performance</span> <span>Turn Data Into Insights</span> <span>Identify Energy Opportunities</span> <span>Make Smarter Energy Decisions</span> </div>
			<div class="scrolling-content"> <span>Understand Your Energy</span> <span>Monitor Building Performance</span> <span>Turn Data Into Insights</span> <span>Identify Energy Opportunities</span> <span>Make Smarter Energy Decisions</span> </div>
		</div>
	</div>
</div> @include('include.footer')