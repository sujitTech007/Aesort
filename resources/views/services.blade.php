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
                        <a href="{{ route('service.detail', $service->slug) }}" class="service-box-link"></a>

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


<!-- Energy Opportunity Assessment Section Start -->
<section class="energy-opportunity pt-5">
    <div class="container">

        <!-- Section Title Start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center mb-5">
                    <h3 class="wow fadeInUp">Start Your Energy Journey</h3>
                    <h2 class="text-anime">From Opportunity to Proof</h2>
                </div>
            </div>
        </div>
        <!-- Section Title End -->

        <!-- Opportunity Steps Start -->
        <div class="row g-4">

            <!-- Step 01 -->
            <div class="col-lg-6 col-md-6">
                <div class="proof-card h-100">

                    <div class="mb-2">
                        <span class="text-muted fw-medium">01</span>
                    </div>

                    <h3 class="h4 fw-bold mb-3">
                        Free Energy Opportunity Assessment
                    </h3>

                    <p class="text-muted mb-4">
                        Review available energy data and business requirements
                        to identify potential energy-efficiency opportunities.
                    </p>

                    <a href="{{ route('contact') }}" class="btn-default d-inline-block">
                        Request an Assessment
                    </a>

                </div>
            </div>

            <!-- Step 02 -->
            <div class="col-lg-6 col-md-6">
                <div class="proof-card h-100">

                    <div class="mb-2">
                        <span class="text-muted fw-medium">02</span>
                    </div>

                    <h3 class="h4 fw-bold mb-3">
                        Controlled Proof of Concept
                    </h3>

                    <p class="text-muted mb-4">
                        Selected businesses can proceed through a focused pilot
                        to evaluate performance, usability, and results.
                    </p>

                    <a href="{{ route('contact') }}" class="btn-default d-inline-block">
                        Explore a POC
                    </a>

                </div>
            </div>

        </div>
        <!-- Opportunity Steps End -->

    </div>
</section>
<!-- Energy Opportunity Assessment Section End -->


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
<section class="py-5"> <div class="container"> <div class="row align-items-center g-4"> <div class="col-lg-5"> <span class="text-uppercase small fw-semibold">Service Scope</span> <h2 class="mt-2 mb-0">Implementation & Responsibility</h2> </div>

        <div class="col-lg-7">
            <p class="mb-0 text-muted">
                AESORT provides recommendations, optimization, and automation services
                according to the agreed scope. Implementation and ongoing maintenance
                are provided only when included in the applicable service or
                subscription plan.
            </p>
        </div>
    </div>
</div>

</section> 

<!-- Why Choose us Section Start -->
<!-- Services Benefits Section Start -->
<section class="why-choose-us">
    <div class="container">

        <!-- Section Title Start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="wow fadeInUp">Built for Decision-Makers</h3>
                    <h2 class="text-anime">Benefits Across Your Business</h2>
                </div>
            </div>
        </div>
        <!-- Section Title End -->

        <!-- Benefits Start -->
        <div class="row">

            <!-- Owners & Operators -->
            <div class="col-lg-3 col-md-6">
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.25s">

                    <div class="why-choose-image">
                        <img src="assets/images/whyus-1.jpg" alt="AESORT benefits for owners and operators">
                    </div>

                    <div class="why-choose-content">

                        <div class="why-choose-icon">
                            <img src="assets/images/realtime-icon.png" alt="">
                        </div>

                        <h3>Owners & Operators</h3>

                        <p>
                            Gain visibility into energy performance,
                            identify opportunities, and manage operating costs.
                        </p>

                    </div>
                </div>
            </div>

            <!-- Property Managers -->
            <div class="col-lg-3 col-md-6">
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.5s">

                    <div class="why-choose-image">
                        <img src="assets/images/whyus-left-img.jpg" alt="AESORT benefits for property managers">
                    </div>

                    <div class="why-choose-content">

                        <div class="why-choose-icon">
                            <img src="assets/images/tailred-icon.png" alt="">
                        </div>

                        <h3>Property Managers</h3>

                        <p>
                            Centralize energy management across properties
                            and support more informed operational decisions.
                        </p>

                    </div>
                </div>
            </div>

            <!-- Facility Managers -->
            <div class="col-lg-3 col-md-6">
                <div class="why-choose-item wow fadeInUp" data-wow-delay="0.75s">

                    <div class="why-choose-image">
                        <img src="assets/images/whyus-3.jpg" alt="AESORT benefits for facility managers">
                    </div>

                    <div class="why-choose-content">

                        <div class="why-choose-icon">
                            <img src="assets/images/sustainability-icon.png" alt="">
                        </div>

                        <h3>Facility Managers</h3>

                        <p>
                            Monitor energy performance, identify inefficiencies,
                            and support practical optimization measures.
                        </p>

                    </div>
                </div>
            </div>

            <!-- Sustainability & Finance -->
            <div class="col-lg-3 col-md-6">
                <div class="why-choose-item wow fadeInUp" data-wow-delay="1.0s">

                    <div class="why-choose-image">
                        <img src="assets/images/whyus-left-img.jpg"
                            alt="AESORT benefits for sustainability and finance teams">
                    </div>

                    <div class="why-choose-content">

                        <div class="why-choose-icon">
                            <img src="assets/images/seamless-icon.png" alt="">
                        </div>

                        <h3>Sustainability & Finance</h3>

                        <p>
                            Connect energy performance with sustainability
                            goals, cost savings, and measurable business value.
                        </p>

                    </div>
                </div>
            </div>

        </div>
        <!-- Benefits End -->

    </div>
</section>
<!-- Services Benefits Section End -->
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