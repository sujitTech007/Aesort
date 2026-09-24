@php
    $pageTitle = $pageTitle ?? 'About-Us – Aesort';
    $currentPage = $currentPage ?? 'about';
@endphp
@include('include.header')

<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime">About us</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-separator">/</li>

                            <li class="breadcrumb-item active" aria-current="page">About us</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->


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
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">About Us</h3>
                    <h2 class="text-anime"> Empowering Smart Sustainability</h2>
                </div>
                <!-- Section Title End -->

                <!-- About us Content Start -->
                <div class="about-content wow fadeInUp" data-wow-delay="0.25s">
                    At Aesort Smart Energy Inc., we are revolutionizing energy management for
                    commercial spaces. With cutting-edge IoT technology and predictive analytics, we
                    empower businesses to optimize energy usage, cut costs, and reduce their carbon
                    footprint.</p>

                    <p>We provide a user-friendly, data-driven platform that enable our customers to monitor, analyze,
                        and optimize their energy usage, ultimately driving cost savings, reducing environmental impact,
                        and fostering a more sustainable future for generations to come.</p>

                    <ul>
                        <li>Real-time Monitoring</li>
                        <li>Dashboard Control</li>
                        <li>Utility Monitoring</li>
                        <li>Customized Solutions</li>
                    </ul>

                </div>
                <!-- About us Content End -->
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->
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

                        <h3>Real-Time Insights</h3>
                        <p>Access real-time data to monitor,
                            analyze, and optimize your energy
                            consumption effortlessly.</p>
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

                        <h3> Tailored Solutions</h3>
                        <p> We offer customized strategies for
                            diverse sectors, including hospitality,
                            retail, and education.</p>
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
                            <img src="assets/images/Sustainability-icon.png" alt="">
                        </div>

                        <h3>Sustainability Focus</h3>
                        <p>Reduce your carbon footprint and
                            contribute to a greener planet.</p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="1.0s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-4.jpg" alt="">
                    </div>

                    <div class="why-choose-content">
                        <div class="why-choose-icon">
                            <img src="assets/images/seamless-icon.png" alt="">
                        </div>

                        <h3> Seamless Integration</h3>
                        <p> Our platform integrates effortlessly
                            with your existing systems for
                            streamlined operations.</p>
                    </div>
                </div>
                <!-- Why Choose Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Why Choose us Section End -->


<!-- Our Process Section Start -->
<div class="our-process">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Latest Process</h3>
                    <h2 class="text-anime">Our Work Process</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
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
                        <h3>Analyze</h3>
                        <p>Collect and assess real-time energy data to
                            identify.
                        </p>
                    </div>
                </div>
            </div>

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
                        <h3>Diagnose</h3>
                        <p>Pinpoint root causes of energy waste.</p>
                    </div>
                </div>
            </div>

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
                        <p> Implement actionable recommendations.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="step-item step-4 wow fadeInUp" data-wow-delay="0.75s">
                    <div class="step-header">
                        <div class="step-icon">
                            <figure>
                                <img src="assets/images/whychooseicon3.png" alt="">
                            </figure>
                            <span class="step-no">04</span>
                        </div>
                    </div>
                    <div class="step-content">
                        <h3>Maintain</h3>
                        <p>Ensure ongoing efficiency with continuous.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Our Process Section End -->

<!-- Counter Section Start -->
<div class="stat-counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <div class="counter-icon">
                        <img src="assets/images/icon-project.svg" alt="">
                    </div>

                    <div class="counter-content">
                        <h3><span class="counter">86</span>+</h3>
                        <p>Project Done</p>
                    </div>
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <div class="counter-icon">
                        <img src="assets/images/icon-happy-clients.svg" alt="">
                    </div>

                    <div class="counter-content">
                        <h3><span class="counter">120</span>+</h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <div class="counter-icon">
                        <img src="assets/images/icon-award.svg" alt="">
                    </div>

                    <div class="counter-content">
                        <h3><span class="counter">20</span>+</h3>
                        <p>Award Winning</p>
                    </div>
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <div class="counter-icon">
                        <img src="assets/images/icon-ratting.svg" alt="">
                    </div>

                    <div class="counter-content">
                        <h3><span class="counter">110</span>+</h3>
                        <p>Rating Customer</p>
                    </div>
                </div>
                <!-- Counter Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->
 
<!-- Our Team Section Start -->
<div class="our-team">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Team</h3>
                    <h2 class="text-anime">Meet Our Best Experts</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 testimonial-slider2">
                <!-- Team Item Start -->
                <div class="testimonial-item2 wow fadeInUp" data-wow-delay="0.25s">                    
                    <div class="testimonial-author-info">
                        <h4> Ayodele Adegboyega Adeyemi</h4>
                        <p>Co-Founder & CEO</p>                       
                    </div>
                    <div class="testimonial-body">
                        <p>Ayodele brings visionary leadership and innovation to the core of our company's mission.</p>
                    </div>
                </div>
                <!-- Team Item End -->
            </div>

            <div class="col-lg-3 col-md-6 mb-4 testimonial-slider2">
                <!-- Team Item Start -->
                <div class="testimonial-item2 wow fadeInUp" data-wow-delay="0.5s">                    
                    <div class="testimonial-author-info">
                        <h4>Emmanuel Ilesanmi</h4>
                        <p>Co-Founder & CTCO</p>                      
                    </div>
                    <div class="testimonial-body">
                <p>Emmanuel leads our technology team with a passion for solving complex problems through smart systems.</p>
            </div>
                </div>
                <!-- Team Item End -->
            </div>

            <div class="col-lg-3 col-md-6 mb-4 testimonial-slider2">
                <!-- Team Item Start -->
                <div class="testimonial-item2 wow fadeInUp" data-wow-delay="0.75s">                    
                    <div class="testimonial-author-info">
                        <h4>Oluwaseyi Ajayi</h4>
                        <p>Co-Founder & COO</p>                      
                    </div>
                    <div class="testimonial-body">
                <p>Oluwaseyi ensures that our operations run smoothly and our clients receive the best experience.</p>
            </div>
                </div>
                <!-- Team Item End -->
            </div>

            <div class="col-lg-3 col-md-6 mb-4 testimonial-slider2">
                <!-- Team Item Start -->
                <div class="testimonial-item2 wow fadeInUp" data-wow-delay="1.0s">                    
                    <div class="testimonial-author-info">
                        <h4>Ekhorutomwen Osemwinyen</h4>
                        <p>Co-Founder & Chief Analytics Officer</p>                      
                    </div>
                    <div class="testimonial-body">
                <p>Ekhorutomwen transforms data into actionable insights that drive our energy intelligence.</p>
            </div>
                </div>
                <!-- Team Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Team Section End -->
 

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
                                    <img src="assets/images/cta-image.jpg" alt="">
                                </figure>
                            </div>
                            <!-- CTA Image End -->
                        </div>

                        <div class="col-lg-8">
                            <!-- CTA Content Start -->
                            <div class="cta-content">
                                <div class="phone-icon">
                                    <figure>
                                        <img src="assets/images/icon-cta-phone.svg" alt="">
                                    </figure>
                                </div>
                                <h3 class="text-anime">Have Questions? <span>Call Us</span> 800-001-658</h3>
                                <p class="wow fadeInUp" data-wow-delay="0.25s">It is a long established fact that a
                                    reader will be distracted by the readable content of a page when looking at its
                                    layout.</p>
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




<!-- Testimonial Layout 2 Section Start -->
<div class="testimonial-layout2 d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">Our Testimonials</h3>
                    <h2 class="text-anime">See What People Say's About Us</h2>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Testimonial Slider Layout 2 Start -->
                <div class="testimonial-slider2">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item2">
                                    <div class="testimonial-header">
                                        <div class="testimonial-author-image">
                                            <img src="assets/images/testimonials-thumb-1.jpg" alt="">
                                        </div>

                                        <div class="testimonial-author-info">
                                            <h3>Michael Carter</h3>
                                            <p>Facility Manager, Retail Chain</p>
                                        </div>
                                    </div>

                                    <div class="testimonial-body">
                                        <p>AESORT’s energy monitoring system helped us identify where we were wasting power across multiple stores. Within a few months, we started seeing noticeable savings in our electricity bills.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item2">
                                    <div class="testimonial-header">
                                        <div class="testimonial-author-image">
                                            <img src="assets/images/testimonials-thumb-2.jpg" alt="">
                                        </div>

                                        <div class="testimonial-author-info">
                                            <h3>Sarah Thompson</h3>
                                            <p>Restaurant Owner</p>
                                        </div>
                                    </div>

                                    <div class="testimonial-body">
                                        <p>The real-time dashboard makes it very easy to track energy usage across our property. AESORT has helped us improve efficiency without disrupting our daily operations.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item2">
                                    <div class="testimonial-header">
                                        <div class="testimonial-author-image">
                                            <img src="assets/images/testimonials-thumb-3.jpg" alt="">
                                        </div>

                                        <div class="testimonial-author-info">
                                            <h3>David Richardson</h3>
                                            <p>Warehouse Operations Director</p>
                                        </div>
                                    </div>

                                    <div class="testimonial-body">
                                        <p>Before using AESORT, we had very little visibility into our energy consumption. The platform’s insights helped us optimize equipment usage and reduce unnecessary costs.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->

                            <!-- Testimonial Slide Start -->
                            <div class="swiper-slide">
                                <div class="testimonial-item2">
                                    <div class="testimonial-header">
                                        <div class="testimonial-author-image">
                                            <img src="assets/images/testimonials-thumb-4.jpg" alt="">
                                        </div>

                                        <div class="testimonial-author-info">
                                            <h3>Laura Mitchell</h3>
                                            <p>Property Manager</p>
                                        </div>
                                    </div>

                                    <div class="testimonial-body">
                                        <p>AESORT provides a simple and practical way to monitor energy use in our commercial building. The analytics and recommendations have helped us improve sustainability and reduce operational expenses</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Testimonial Slide End -->
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <!-- Testimonial Slider Layout 2 End -->
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Layout 2 Section End -->



<!-- Footer Ticker Start -->
<div class="footer-ticker">
    <div class="scrolling-ticker">
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span>Optimize Your Energy Usage</span>
                <span>Maximize Industrial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Industry</span>
                <span>Reliable 24×7 Monitoring</span>

            </div>

            <div class="scrolling-content">
                <span>Optimize Your Energy Usage</span>
                <span>Maximize Industrial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Industry</span>
                <span>Reliable 24×7 Monitoring</span>

            </div>
        </div>
    </div>
</div>
@include('include.footer')