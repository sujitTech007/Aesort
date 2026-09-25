@include('include.header')

<div class="preloader">

    <div class="loading-container">

        <div class="loading"></div>

        <div id="loading-icon"><img src="assets/images/loader-icon.png" alt=""></div>

    </div>

</div>


<!-- Hero Layout 2 Section Start -->
<div class="hero parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="hero-content">
                    <div class="section-title">
                        <h3 class="wow fadeInUp" style="color:white">
                            Welcome to Aesort
                        </h3>

                        <h1 class="text-anime">
                            Make Smarter Decisions With Better Energy Data
                        </h1>
                    </div>

                    <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                        <p>
                            AESORT analyzes available energy data to identify usage patterns,
                            highlight inefficiencies, and provide actionable insights that help
                            commercial businesses improve energy performance and manage costs.
                        </p>
                    </div>

                    <div class="hero-content-footer wow fadeInUp" data-wow-delay="0.75s">
                        <a href="{{ route('about') }}" class="btn-default btn-border">
                            Know More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Layout 2 Section End -->

<!-- About Section Start -->
<div class="about-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- About us Image Start -->
                <div class="about-image">
                    <div class="about-img-1">
                        <figure class="reveal image-anime"
                            style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                            <img src="assets/images/about-1.jpg" alt="" style="transform: translate(0px, 0px);">
                        </figure>
                    </div>

                    <div class="about-img-2">
                        <figure class="reveal image-anime"
                            style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                            <img src="assets/images/about-2.jpg" alt="" style="transform: translate(0px, 0px);">
                        </figure>
                    </div>
                </div>
                <!-- About us Image End -->
            </div>

            <div class="col-lg-6">
                <div class="section-title">
                    <h3 class="wow fadeInUp">About Us</h3>

                    <h2 class="text-anime">
                        Transforming the Way Businesses Manage Energy
                    </h2>
                </div>

                <div class="about-content wow fadeInUp" data-wow-delay="0.25s">

                    <p>
                        At Aesort Smart Energy Inc., we help building owners, property and
                        facility managers, sustainability leads, and finance teams understand
                        energy usage, identify inefficiencies, and make informed decisions to
                        improve energy performance.
                    </p>

                    <p>
                        Our data-driven platform helps businesses monitor, analyze, and
                        optimize energy usage while supporting cost management and
                        sustainability goals.
                    </p>

                    <ul>
                        <li>Energy Monitoring</li>
                        <li>Dashboard Control</li>
                        <li>Utility Monitoring</li>
                        <li>Verified Savings Reports</li>
                    </ul>

                    <a href="{{ route('about') }}" class="btn-default">
                        More About
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->


<!-- Our Services Section Start -->
<div class="our-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Services</h3>
                    <h2 class="text-anime"> Smart Energy Solutions for Your Business </h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Services Slider Start -->
                <div class="services-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Service Slide Start -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-image">
                                        <figure>
                                            <img src="assets/images/service-1.jpg" alt="">
                                        </figure>

                                        <div class="service-icon">
                                            <img src="assets/images/icon-service-1.svg" alt="">
                                        </div>
                                    </div>

                                    <div class="service-content">
                                        <h3>Streamlined Oversight</h3>
                                        <p>Our platform enables commercial users to streamline oversight.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Service Slide End -->

                            <!-- Service Slide Start -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-image">
                                        <figure>
                                            <img src="assets/images/service-2.jpg" alt="">
                                        </figure>

                                        <div class="service-icon">
                                            <img src="assets/images/icon-service-2.svg" alt="">
                                        </div>
                                    </div>

                                    <div class="service-content">
                                        <h3>Cost Mitigation</h3>
                                        <p>Identify opportunities to reduce energy costs and improve efficiency.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Service Slide End -->

                            <!-- Service Slide Start -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-image">
                                        <figure>
                                            <img src="assets/images/service-3.jpg" alt="">
                                        </figure>

                                        <div class="service-icon">
                                            <img src="assets/images/icon-service-3.svg" alt="">
                                        </div>
                                    </div>

                                    <div class="service-content">
                                        <h3>Energy Efficiency Improvement</h3>
                                        <p>Our platform provides customized solutions tailored to different sectors
                                            .</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Service Slide End -->

                            <!-- Service Slide Start -->
                            <div class="swiper-slide">
                                <div class="service-item">
                                    <div class="service-image">
                                        <figure>
                                            <img src="assets/images/service-2.jpg" alt="">
                                        </figure>

                                        <div class="service-icon">
                                            <img src="assets/images/icon-service-2.svg" alt="">
                                        </div>
                                    </div>

                                    <div class="service-content">
                                        <h3>Effective Management</h3>
                                        <p>Catch issues like after-hours HVAC, equipment cycling, and baseload drift.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- Service Slide End -->
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Services Slider End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Services Section End -->

<!-- Our Process Section Start -->
<div class="our-process">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">
                        Our Approach
                    </h3>

                    <h2 class="text-anime">
                        How AESORT Works
                    </h2>
                </div>
                <!-- Section Title End -->

            </div>
        </div>

        <div class="row">

            <!-- Step 01 -->
            <div class="col-md-3">
                <div class="step-item step-1 wow fadeInUp" data-wow-delay="0.25s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure>
                                <img src="assets/images/icon-step-1.svg" alt="">
                            </figure>
                            <span class="step-no">01</span>
                        </div>
                    </div>

                    <div class="step-content">
                        <h3>Monitor</h3>
                        <p>
                            Understand your energy usage through available data and metrics.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 02 -->
            <div class="col-md-3">
                <div class="step-item step-2 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure>
                                <img src="assets/images/icon-step-2.svg" alt="">
                            </figure>
                            <span class="step-no">02</span>
                        </div>
                    </div>

                    <div class="step-content">
                        <h3>Identify</h3>
                        <p>
                            Compare performance to identify inefficiencies and opportunities.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 03 -->
            <div class="col-md-3">
                <div class="step-item step-3 wow fadeInUp" data-wow-delay="0.75s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure>
                                <img src="assets/images/icon-step-3.svg" alt="">
                            </figure>
                            <span class="step-no">03</span>
                        </div>
                    </div>

                    <div class="step-content">
                        <h3>Optimize</h3>
                        <p>
                            Apply actionable insights and recommendations to improve efficiency.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Step 04 -->
            <div class="col-md-3">
                <div class="step-item step-4 wow fadeInUp" data-wow-delay="1s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure>
                                <img src="assets/images/whychooseicon3.png" alt="">
                            </figure>
                            <span class="step-no">04</span>
                        </div>
                    </div>

                    <div class="step-content">
                        <h3>Measure</h3>
                        <p>
                            Track results through reporting to verify progress and value.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Our Process Section End -->

<!-- Pricing Layout 2 Start -->
<div class="pricing-layout2" id="subscription">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Pricing</h3>
                    <h2 class="text-anime">Choose Your Best Offer</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <!-- Pricing Item Box Start -->
                <div class="pricing-item2 wow fadeInUp" data-wow-delay="0.25s">
                    <div class="package-icon-box">
                        <img src="assets/images/icon-pricing-1.svg" alt="">
                    </div>

                    <div class="price-header">
                        <h2>Basic</h2>

                    </div>

                    <div class="price-body">
                        <ul>
                            <li>$2,499 per month for users with up to 2,000 sq ft of commercial space</li>
                            <li>$5,999 per month for users with more than 2,000 sq. ft. up to 5,000 of sq. ft.
                                commercial space.</li>
                            <li>Custom Quote for users with more than 5,000 of sq ft commercial space.</li>


                        </ul>
                    </div>

                    <!-- <div class="price-buy-button">
                            <a href="{{ route('contact') }}" class="btn-default">Subscribe</a>
						</div>						 -->
                </div>
                <!-- Pricing Item Box End -->
            </div>

            <div class="col-lg-4">
                <!-- Pricing Item Box Start -->
                <div class="pricing-item2 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="package-icon-box">
                        <img src="assets/images/icon-pricing-2.svg" alt="">
                    </div>

                    <div class="price-header">
                        <h2>Standard</h2>

                    </div>

                    <div class="price-body">
                        <ul>
                            <li>$399 per month for users with up to 2,000 sq. ft. of commercial space.</li>
                            <li>$599 per month for users with more than 2,000 sq. ft. up to 5,000 of sq. ft. commercial
                                space.</li>
                            <li>Custom Quote for users with more than 5,000 of sq. ft. commercial space.</li>


                        </ul>
                    </div>

                    <!-- <div class="price-buy-button">
                            <a href="{{ route('contact') }}" class="btn-default">Subscribe</a>
						</div>						 -->
                </div>
                <!-- Pricing Item Box End -->
            </div>

            <div class="col-lg-4">
                <!-- Pricing Item Box Start -->
                <div class="pricing-item2 wow fadeInUp" data-wow-delay="0.75s">
                    <div class="package-icon-box">
                        <img src="assets/images/icon-pricing-3.svg" alt="">
                    </div>

                    <div class="price-header">
                        <h2>Premium</h2>

                    </div>

                    <div class="price-body">
                        <ul>
                            <li>Data Insights and Analytics ($699/ report)</li>
                            <li>This model includes data insights and analytics generated by the system for details into
                                energy consumption patterns, cost-saving opportunities, and environmental impact
                                assessments.</li>



                        </ul>
                    </div>

                    <!-- <div class="price-buy-button">
                            <a href="{{ route('contact') }}" class="btn-default">Subscribe</a>
						</div>						 -->
                </div>
                <!-- Pricing Item Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Pricing Layout 2 End -->


<!-- Our Sklii Section Start -->
<div class="our-skills">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Energy Performance</h3>
                    <h2 class="text-anime">Understand and Improve Your Energy Performance</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.25s">
                        Gain clearer insight into energy performance, benchmarked against Canadian
                        standards and adjusted for your province's rates and climate.
                    </p>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="col-lg-6">
                <div class="skills-box">
                    <!-- Skill Item Start -->
                    <div class="skillbar" data-percent="95%">
                        <div class="skill-data">
                            <div class="title">Solar Panels</div>
                            <div class="count">95%</div>
                        </div>
                        <div class="skill-progress">
                            <div class="count-bar"></div>
                        </div>
                    </div>
                    <!-- Skill Item End -->

                    <!-- Skill Item Start -->
                    <div class="skillbar" data-percent="80%">
                        <div class="skill-data">
                            <div class="title">Hybrid Energy</div>
                            <div class="count">80%</div>
                        </div>
                        <div class="skill-progress">
                            <div class="count-bar"></div>
                        </div>
                    </div>
                    <!-- Skill Item End -->

                    <!-- Skill Item Start -->
                    <div class="skillbar" data-percent="70%">
                        <div class="skill-data">
                            <div class="title">Marketing</div>
                            <div class="count">70%</div>
                        </div>
                        <div class="skill-progress">
                            <div class="count-bar"></div>
                        </div>
                    </div>
                    <!-- Skill Item End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Sklii Section End -->

<!-- Infobar Section Start -->
<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-box">
                    <div class="row align-items-center">

                        <div class="col-lg-4">
                            <!-- CTA Image Start -->
                            <div class="cta-image">
                                <figure class="image-anime">
                                    <img src="assets/images/cta-image.jpg" alt="AESORT energy solutions">
                                </figure>
                            </div>
                            <!-- CTA Image End -->
                        </div>

                        <div class="col-lg-8">
                            <!-- CTA Content Start -->
                            <div class="cta-content">

                                <h3 class="text-anime">
                                    Have Questions? <span>Contact Us Today</span>
                                </h3>

                                <p class="wow fadeInUp" data-wow-delay="0.25s">
                                    Our team is here to help you explore the right energy solutions
                                    for your business.
                                </p>

                                <a href="{{ route('contact') }}" class="btn-default fw-medium mt-4 px-4 py-2">
                                    Contact Us
                                </a>

                            </div>
                            <!-- CTA Content End -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Infobar Section End -->


<!-- Assessment / POC Layout Start -->
<div class="assessment" style="padding-bottom: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-4">
                    <h3 class="wow fadeInUp">Get Started</h3>
                    <h2 class="text-anime">Start With an Energy Opportunity Assessment</h2>

                    {{-- <p class="wow fadeInUp" data-wow-delay="0.25s">
                        No permanent hardware required upfront. Start with an assessment, validate
                        results through a controlled pilot, then decide on a full rollout.
                    </p> --}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="step-item step-1 wow fadeInUp" data-wow-delay="0.25s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure><img src="assets/images/icon-step-1.svg" alt=""></figure>
                            <span class="step-no">01</span>
                        </div>
                    </div>
                    <div class="step-content">
                        <h3>Assess</h3>
                        <p>We review your available energy data and facility needs to identify opportunities.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-item step-2 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure><img src="assets/images/icon-step-2.svg" alt=""></figure>
                            <span class="step-no">02</span>
                        </div>
                    </div>
                    <div class="step-content">
                        <h3>Pilot</h3>
                        <p>A scoped pilot proves value — no permanent hardware installed.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="step-item step-3 wow fadeInUp" data-wow-delay="0.75s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure><img src="assets/images/icon-step-3.svg" alt=""></figure>
                            <span class="step-no">03</span>
                        </div>
                    </div>
                    <div class="step-content">
                        <h3>Measure</h3>
                        <p>Results are reviewed against agreed success metrics before you decide on next steps.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="text-align: center; margin-top: 30px;">
                <a href="{{ route('contact') }}" class="btn-default">Request Your Assessment</a>
            </div>
        </div>
    </div>
</div>
<!-- Assessment / POC Layout End -->



<!-- Why Choose us Section Start -->
<div class="why-choose-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Why Choose Us</h3>
                    <h2 class="text-anime"> Why Choose Aesort Smart Energy</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-1.jpg" alt="">
                    </div>

                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <img src="assets/images/realtime-icon.png" alt="">
                        </div>

                        <h3>Actionable Energy Insights</h3>
                        <p>
                            Turn energy data into clear insights that help
                            identify consumption patterns, inefficiencies,
                            and opportunities for improvement.
                        </p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.5s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-left-img.jpg" alt="">
                    </div>

                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <img src="assets/images/tailred-icon.png" alt="">
                        </div>

                        <h3>Portfolio Visibility</h3>
                        <p>Monitor and compare performance across
                            multiple sites from a single view —
                            built for businesses managing more than
                            one building.</p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.75s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-3.jpg" alt="">
                    </div>

                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <img src="assets/images/sustainability-icon.png" alt="">
                        </div>

                        <h3>Sustainability Focus</h3>
                        <p>Reduce your carbon footprint and
                            contribute to a greener planet.</p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="why-choose-item wow fadeInUp" data-wow-delay="1.0s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-left-img.jpg" alt="">
                    </div>

                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <img src="assets/images/seamless-icon.png" alt="">
                        </div>

                        <h3>Flexible Integration</h3>

                        <p>
                            Works with compatible systems and devices,
                            based on integration requirements.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose us Section End -->

<!-- Solar Calculator Section Start -->
<div class="solar-calculator">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="calculator-box wow fadeInUp">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-title">
                                <h3>Energy Calculator</h3>
                                <h2>Estimate Your Energy Savings</h2>
                                <p>Explore potential savings based on your energy usage.</p>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="solar-form">
                                <form id="solarForm">
                                    <div class="row">

                                        <div class="form-group col-md-6 mb-3">
                                            <select name="category" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email Address">
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <input type="tel" name="phone" class="form-control"
                                                placeholder="Phone Number" inputmode="numeric" pattern="[0-9]{10,12}"
                                                maxlength="12" minlength="10">
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <input type="number" name="bill" class="form-control"
                                                placeholder="Average Monthly Electricity Bill (CAD)" min="0" step="0.01"
                                                required>
                                        </div>

                                        <div class="form-group col-md-6 mb-3">
                                            <input type="number" name="capacity" class="form-control"
                                                placeholder="Estimated System Capacity (kW)" min="0" step="0.1"
                                                required>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn-default w-100">
                                                Calculate Savings
                                            </button>
                                        </div>

                                        <div class="col-md-12 mt-3">
                                            <div id="calculatorResult" class="alert alert-success d-none"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <small class="text-muted">This is an initial estimate — actual savings are
                                                verified during your pilot.</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('solarForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const bill = parseFloat(document.querySelector('[name="bill"]').value);
        const capacity = parseFloat(document.querySelector('[name="capacity"]').value);

        // Only bill and system size are required for the calculation
        if (!bill || bill <= 0 || !capacity || capacity <= 0) {
            alert('Please enter a valid electricity bill and system size.');
            return;
        }

        // Estimated energy savings
        const savingsRate = 0.70;
        const costPerKW = 3000;

        const monthlySaving = bill * savingsRate;
        const yearlySaving = monthlySaving * 12;
        const estimatedSystemCost = capacity * costPerKW;
        const paybackYears = estimatedSystemCost / yearlySaving;

        const formatCAD = (amount) => {
            return new Intl.NumberFormat('en-CA', {
                style: 'currency',
                currency: 'CAD',
                maximumFractionDigits: 0
            }).format(amount);
        };

        const resultHTML = `
            <strong>Estimated Energy Savings</strong><br>
            Estimated Monthly Savings: ${formatCAD(monthlySaving)}<br>
            Estimated Annual Savings: ${formatCAD(yearlySaving)}<br>
            Estimated System Cost: ${formatCAD(estimatedSystemCost)}<br>
            Estimated Payback Period: ${paybackYears.toFixed(1)} years
        `;

        const resultBox = document.getElementById('calculatorResult');

        resultBox.innerHTML = resultHTML;
        resultBox.classList.remove('d-none');
    });
</script>
<!-- Solar Calculator Section End -->

<!-- Latest News Section Start -->
<div class="latest-news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Insights & Updates</h3>
                    <h2 class="text-anime">Stay Ahead in Smart Energy Management</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <!-- Blog Item Start -->
                <div class="blog-item wow fadeInUp" data-wow-delay="0.25s">
                    <div class="post-featured-image">
                        <figure class="image-anime">
                            <img src="assets/images/post-1.jpg" alt="">
                        </figure>
                    </div>

                    <div class="post-item-body">
                        <h2><a href="{{ route('blog.detail') }}">Transforming Energy Efficiency with Machine
                                Learning</a></h2>
                        <div class="post-meta">
                            <ul>
                                <li><a href="#"><i class="fa-regular fa-calendar-days"></i> 09 Feb 2025</a></li>
                                <li><a href="#"><i class="fa-solid fa-tag"></i> Solar Panel</a></li>
                            </ul>
                        </div>

                        <div class="btn-readmore">
                            <a href="{{ route('blog.detail') }}" class="btn-default">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Item End -->
            </div>

            <div class="col-lg-4">
                <!-- Blog Item Start -->
                <div class="blog-item wow fadeInUp" data-wow-delay="0.5s">
                    <div class="post-featured-image">
                        <figure class="image-anime">
                            <img src="assets/images/post-2.jpg" alt="">
                        </figure>
                    </div>

                    <div class="post-item-body">
                        <h2> <a href="{{ route('blog.detail') }}"> Why Energy Monitoring Matters for Businesses </a>
                        </h2>
                        <div class="post-meta">
                            <ul>
                                <li><a href="#"><i class="fa-regular fa-calendar-days"></i> 09 Feb 2025</a></li>
                                <li><a href="#"><i class="fa-solid fa-tag"></i> Solar Panel</a></li>
                            </ul>
                        </div>
                        <div class="btn-readmore">
                            <a href="{{ route('blog.detail') }}" class="btn-default">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Item End -->
            </div>

            <div class="col-lg-4">
                <!-- Blog Item Start -->
                <div class="blog-item wow fadeInUp" data-wow-delay="0.75s">
                    <div class="post-featured-image">
                        <figure class="image-anime">
                            <img src="assets/images/post-3.jpg" alt="">
                        </figure>
                    </div>

                    <div class="post-item-body">
                        <h2><a href="{{ route('blog.detail') }}">Sustainability Trends to Watch in 2025</a></h2>
                        <div class="post-meta">
                            <ul>
                                <li><a href=" #"><i class="fa-regular fa-calendar-days"></i> 09 Feb 2025</a></li>
                                <li><a href="#"><i class="fa-solid fa-tag"></i> Solar Panel</a></li>
                            </ul>
                        </div>

                        <div class="btn-readmore">
                            <a href="{{ route('blog.detail') }}" class="btn-default">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Blog Item End -->
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








<!-- Latest News Section End -->

<!-- Footer Ticker Start -->
<div class="footer-ticker">
    <div class="scrolling-ticker">
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span>Optimize Your Energy Usage</span>
                <span>Maximize Industrial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Industry</span>
                <span>Reliable Energy Monitoring</span>

            </div>

            <div class="scrolling-content">
                <span>Optimize Your Energy Usage</span>
                <span>Maximize Industrial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Industry</span>
                <span>Reliable Energy Monitoring</span>

            </div>
        </div>
    </div>
</div>




<!-- Cookie Section -->








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

    phoneInput.addEventListener('input', function () {

        this.value = this.value.replace(/\D/g, '');

        if (this.value.length > 12) {
            this.value = this.value.slice(0, 12);
        }
    });
</script>

@include('include.footer')