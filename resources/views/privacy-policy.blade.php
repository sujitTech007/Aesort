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

                    <h1 class="text-anime">Privacy Policy</h1>

                    <nav class="wow fadeInUp" data-wow-delay="0.25s">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                            <li class="breadcrumb-separator">/</li>



                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>

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



            <h2>Privacy Policy</h2>

<p>Aesort Smart Energy  is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you access the Aesort platform, IoT integrations, or consulting services.</p>

<p>By using our Services, you consent to the practices described in this Policy.</p>



<h4>Information We Collect</h4>

<p>We collect the following categories of information:</p>



<h6>Personal Information</h6>

<ul class="ms-4">

    <li>Name, email address, phone number</li>

    <li>Company name, role, and business contact details</li>

    <li>Account login details</li>

</ul>



<h6>Energy Usage & Operational Data</h6>

<p class="mb-2">Collected via IoT sensors, clamps, smart switches, or manual input:</p>

<ul class="ms-4">

    <li>Real-time energy consumption</li>

    <li>Device performance</li>

    <li>Environmental factors (temperature, humidity, etc.)</li>

    <li>Utility usage (electricity, gas, water)</li>

</ul>



<h6>Technical & Device Data</h6>

<ul class="ms-4">

    <li>IP address, browser type, device type</li>

    <li>Log data</li>

    <li>Web analytics</li>

</ul>



<h6>Billing Information</h6>

<ul class="ms-4">

    <li>Payment method</li>

    <li>Transaction history</li>

</ul>

<p>Payment processing may be handled by a secure third-party provider.</p>



<h4>How We Use Your Information</h4>

<p class="mb-2">We use collected data to:</p>

<ul class="ms-4">

    <li>Provide, maintain, and improve the Aesort platform</li>

    <li>Deliver real-time monitoring, dashboards, and analytics</li>

    <li>Generate recommendations and alerts</li>

    <li>Produce customized reports</li>

    <li>Train and improve machine learning algorithms</li>

    <li>Provide customer support</li>

    <li>Process payment and billing</li>

    <li>Ensure security and fraud prevention</li>

    <li>Comply with legal obligations</li>

</ul>



<h4>Data Sharing</h4>

<p>We do not sell personal information.</p>

<p class="mb-2">We may share data with:</p>

<ul class="ms-4">

    <li>Service providers (hosting, analytics, billing)</li>

    <li>IoT hardware partners during installation</li>

    <li>Regulatory bodies when legally required</li>

    <li>Consultants assisting with custom services</li>

</ul>

<p>In all cases, only the minimum necessary data is shared. Aesort may share anonymized aggregated data for benchmarking, research, or insights.</p>



<h4>Data Retention</h4>

<p class="mb-2">We retain:</p>

<ul class="ms-4">

    <li>Account data for as long as your subscription is active;</li>

    <li>IoT-collected energy data for analytics and historical reporting as long as reasonably necessary;</li>

    <li>Billing records as required by law.</li>

</ul>

<p>You may request deletion of your data (see Section 10).</p>



<h4>Data Security</h4>

<p class="mb-2">We use industry-standard security measures to protect your data, including:</p>

<ul class="ms-4">

    <li>Encryption in transit and at rest</li>

    <li>Role-based access control</li>

    <li>Secure APIs</li>

    <li>Strong authentication policies</li>

    <li>Regular security assessments</li>

</ul>

<p>However, no system is 100% secure. Users are responsible for safeguarding their login credentials.</p>



<h4>Cookies & Tracking</h4>

<p class="mb-2">Aesort uses cookies to:</p>

<ul class="ms-4">

    <li>Improve user experience</li>

    <li>Support analytics</li>

    <li>Enable platform functionality</li>

</ul>

<p>You may disable cookies, but some features may not function properly.</p>



<h4>Third-Party Links</h4>

<p>Our platform may link to third-party websites. We are not responsible for their privacy practices.</p>



<h4>Children’s Privacy</h4>

<p>The Services are not intended for individuals under the age of 18.</p>



<h4> Your Rights</h4>

<p class="mb-2">Depending on your jurisdiction, you may have the right to:</p>

<ul class="ms-4">

    <li>Access your personal information</li>

    <li>Request corrections</li>

    <li>Request deletion</li>

    <li>Withdraw consent</li>

    <li>Port your data</li>

</ul>

<p>Requests can be made via email.</p>



<h4> International Data Transfers</h4>

<p>Aesort may store or process data using cloud services located in Canada, the United States, or other jurisdictions. All transfers comply with applicable privacy laws.</p>



<h4> Changes to this Privacy Policy</h4>

<p>We may revise this Policy. Updates will be posted on Aesort.ca, and continued use constitutes consent to the updated Policy.</p>



<h4> Contact Us</h4>

<p>Aesort Smart Energy Inc.<br>

Email: info@aesort.ca<br>

Address: Suite 301, 231 Oak Park Blvd, Oakville, ON L6H 7S8</p>



        </div>

    </div>

</div>



@include('include.footer')