@php
$pageTitle = $pageTitle ?? 'Warranty Policy – Aesort';
$currentPage = $currentPage ?? 'warranty';
@endphp

@include('include.header')

<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header-box">
                    <h1 class="text-anime">Warranty Policy</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-separator">/</li>
                            <li class="breadcrumb-item active">Warranty</li>
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

            <h2>1. Warranty Coverage</h2>
            <p>Aesort Smart Energy Inc. (“Aesort”) provides a limited warranty on eligible hardware and IoT devices purchased directly from us or authorized partners.</p>

            <h2>2. Warranty Period</h2>
            <ul>
                <li>Standard Warranty: 12 months from the date of purchase</li>
                <li>Warranty applies only to the original purchaser</li>
            </ul>

            <h2>3. What Is Covered</h2>
            <ul>
                <li>Manufacturing defects</li>
                <li>Hardware component failure under normal usage</li>
                <li>Device malfunction caused by internal defects</li>
            </ul>

            <h2>4. What Is Not Covered</h2>
            <ul>
                <li>Accidental or physical damage</li>
                <li>Water or liquid exposure</li>
                <li>Electrical surges or improper power supply</li>
                <li>Unauthorized repairs or modifications</li>
                <li>Normal wear and tear</li>
            </ul>

            <h2>5. Warranty Claim Process</h2>
            <p>To file a warranty claim, users must contact Aesort Support with:</p>
            <ul>
                <li>Proof of purchase</li>
                <li>Device serial number</li>
                <li>Description of the issue</li>
            </ul>

            <h2>6. Resolution</h2>
            <p>Approved claims may result in repair, replacement, or refund at Aesort’s sole discretion.</p>

        </div>
    </div>
</div>

@include('include.footer')
