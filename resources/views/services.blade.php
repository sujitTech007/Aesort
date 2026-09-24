@php
    $pageTitle = $pageTitle ?? 'Service – Aesort';
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
                    <h1 class="text-anime">Our Services</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-separator">/</li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Services List Page Start -->
<div class="page-services">
    <div class="container">
        <div class="row">
             @foreach($services as $service)
            <div class="col-lg-4 col-md-6">
                <!-- Service Item Start -->
                <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                    <a href="{{ route('service.detail', $service->slug ) }}" class="service-box-link"></a>

                    <div class="service-image">
                        <figure>
                            <img src="{{ asset('uploads/service-images/' . $service->banner_image) }}" alt="">
                        </figure>

                         <div class="service-icon">
                            <img src="{{ asset('uploads/service-icons/' . $service->icon) }}" alt="">
                        </div> 
                    </div>

                    <div class="service-content">
                        <h3>{{ $service->title }}</h3>
                        <p>{{ Str::limit($service->short_description, 80) }}</p>
                    </div>
                </div>
                <!-- Service Item End -->
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services List Page End -->


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
                <!-- Why Choose Item Start -->
                <div class="why-choose-item wow fadeInUp" data-wow-delay="1.0s">
                    <div class="why-choose-image">
                        <img src="assets/images/whyus-left-img.jpg" alt="">
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
<!-- Footer Ticker End -->

@include('include.footer')