@php
$pageTitle = $pageTitle ?? 'Support – Aesort';
$currentPage = $currentPage ?? 'support';
@endphp

@include('include.header')

<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header-box">
                    <h1 class="text-anime">Support</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-separator">/</li>
                            <li class="breadcrumb-item active">Support</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact-information">
    <div class="container">
        <div class="row">

            <h2>1. Customer Support</h2>
            <p>Aesort provides professional technical and customer support for all registered users.</p>

            <h2>2. Support Channels</h2>
            <ul>
                <li>Email: support@aesort.ca</li>
                <li>Dashboard Ticket System</li>
            </ul>

            <h2>3. Support Hours</h2>
            <p>Monday – Saturday (10:00 AM – 6:00 PM IST)</p>

            <h2>4. Types of Support</h2>
            <ul>
                <li>Device setup and onboarding</li>
                <li>IoT integration assistance</li>
                <li>Platform and dashboard usage</li>
                <li>Billing and subscription queries</li>
                <li>Warranty and repair support</li>
            </ul>

            <h2>5. Response Time</h2>
            <p>Support requests are typically addressed within 24–48 business hours.</p>

        </div>
    </div>
</div>

@include('include.footer')
