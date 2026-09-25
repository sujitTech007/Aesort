@php

$pageTitle = $pageTitle ?? 'Privacy Policy – Aesort';

$currentPage = $currentPage ?? 'privacy.policy';

@endphp

@include('include.header')

<!-- Page Header Start -->



<div class="page-header parallaxie">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <!-- Page Header Box Start -->

                <div class="page-header-box">

                    <h1 class="text-anime">Cookies Policy</h1>

                    <nav class="wow fadeInUp" data-wow-delay="0.25s">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-separator">/</li>



                            <li class="breadcrumb-item active" aria-current="page">Cookies Policy</li>

                        </ol>

                    </nav>

                </div>

                <!-- Page Header Box End -->

            </div>

        </div>

    </div>

</div>

<div class="contact-information">

    <div class="container">

        <div class="row">



            <h2>Cookie Policy</h2>
            <p class="mb-4">
    <strong>Effective Date:</strong> September 25, 2026<br>
    <strong>Last Updated:</strong> September 25, 2026
</p>


  

  <h4>What Are Cookies?</h4>

  <p>Cookies are small text files stored on your device when you visit a website. They help us improve your experience by remembering your preferences and providing personalized content.</p>

  

  <h4>How We Use Cookies</h4>

  <p class="mb-2">Our website uses cookies for the following purposes:</p>

  <ul class="ms-4">

    <li>To remember your cookie consent preferences.</li>

    <li>To improve website performance and functionality.</li>

    <li>To provide personalized content and recommendations.</li>

    <li>To analyze website traffic and usage trends.</li>

  </ul>

  

  <h4>Types of Cookies We Use</h4>

  <ul class="ms-4">

    <li><strong>Necessary Cookies:</strong> Required for the website to function properly.</li>

    <li><strong>Performance Cookies:</strong> Help us understand how visitors use our website.</li>

    <li><strong>Functional Cookies:</strong> Remember your preferences and settings.</li>

    <!-- <li><strong>Targeting/Advertising Cookies:</strong> Provide relevant advertisements based on your interests.</li> -->

  </ul>



  <h4>Managing Cookies</h4>

  <p>You can choose to accept or decline cookies via our cookie consent popup. You can also manage or delete cookies through your browser settings. Please note that blocking some cookies may affect website functionality.</p>



  <h4>Third-Party Cookies</h4>

  <p>We may use third-party services that also place cookies on your device for analytics, advertising, or other purposes. Please refer to their privacy policies for more details.</p>



  <h4>Changes to This Policy</h4>

  <p>We may update this Cookie Policy from time to time. All changes will be posted on this page with an updated effective date.</p>



  <h4>Contact Us</h4>

  <p>If you have any questions about our use of cookies, please <a href="tel:info@aesort.ca">contact us</a>.</p>



        </div>

    </div>

</div>



@include('include.footer')