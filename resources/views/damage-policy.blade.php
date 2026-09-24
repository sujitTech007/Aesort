@php
$pageTitle = $pageTitle ?? 'Damage Policy – Aesort';
$currentPage = $currentPage ?? 'damage.policy';
@endphp

@include('include.header')

<div class="page-header parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header-box">
                    <h1 class="text-anime">Damage Policy</h1>
                    <nav class="wow fadeInUp" data-wow-delay="0.25s">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-separator">/</li>
                            <li class="breadcrumb-item active">Damage Policy</li>
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

            <h2>1. Accidental Damage</h2>
            <p>Accidental damage is not covered under Aesort’s standard warranty.</p>

            <ul>
                <li>Drops, cracks, or breakage</li>
                <li>Liquid or moisture exposure</li>
                <li>Fire or environmental damage</li>
            </ul>

            <h2>2. Transit Damage</h2>
            <p>If your product arrives damaged, you must report it within 24 hours of delivery along with photos or videos.</p>

            <h2>3. Improper Use</h2>
            <p>Damage caused by improper installation, electrical issues, or unauthorized modifications will void the warranty.</p>

            <h2>4. Inspection & Approval</h2>
            <p>Aesort reserves the right to inspect damaged products before approving any replacement or refund.</p>

            <h2>5. Final Decision</h2>
            <p>All damage-related decisions made by Aesort are final.</p>

        </div>
    </div>
</div>

@include('include.footer')
