@php
  $pageTitle = $pageTitle ?? 'FAQs – Aesort';
  $currentPage = $currentPage ?? 'faqs';
@endphp
@include('include.header')


<style>
  .faq-item .faq-question {
    cursor: default;
  }

  .faq-item {
    margin-bottom: 15px;
  }
</style>

<!-- Page Header Start -->
<div class="page-header parallaxie">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Page Header Box Start -->
        <div class="page-header-box">
          <h1 class="text-anime">FAQs</h1>
          <nav class="wow fadeInUp" data-wow-delay="0.25s">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-separator">/</li>

              <li class="breadcrumb-item" aria-current="page"> FAQs</li>
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
    <div class="row">

            <div class="text-center mb-4 mb-lg-5">
                <div class="service-hero-badge mb-3">
                    <i class="fa-solid fa-leaf me-2"></i>FAQs
                </div>					

                <h2 class="text-anime mb-2">
                    Frequently Asked Questions
                </h2>

                <p class="text-muted mb-0">
                    Find answers to common questions about renewable energy,
                    energy efficiency, and sustainable solutions.
                </p>
            </div>
            
        </div>
   
<div class="faq-accordion">
    <div class="accordion" id="faq_accordion">

        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading1">
                <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse1"
                    aria-expanded="true"
                    aria-controls="collapse1">
                    <span class="faq-number">01</span>
                    What does AESORT do?
                </button>
            </h2>

            <div id="collapse1"
                class="accordion-collapse collapse show"
                aria-labelledby="heading1"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    AESORT helps commercial businesses understand energy usage,
                    identify inefficiencies, and make informed decisions to improve
                    energy efficiency, manage costs, and support sustainability.
                </div>
            </div>
        </div>


        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading2">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse2"
                    aria-expanded="false"
                    aria-controls="collapse2">
                    <span class="faq-number">02</span>
                    What is involved in getting started with AESORT?
                </button>
            </h2>

            <div id="collapse2"
                class="accordion-collapse collapse"
                aria-labelledby="heading2"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    The process begins by understanding your facility, energy usage,
                    existing systems, and energy-management goals. Based on these
                    requirements, AESORT can determine an appropriate approach for
                    monitoring, analysis, and optimization.
                </div>
            </div>
        </div>


        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading3">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse3"
                    aria-expanded="false"
                    aria-controls="collapse3">
                    <span class="faq-number">03</span>
                    Does AESORT require new hardware?
                </button>
            </h2>

            <div id="collapse3"
                class="accordion-collapse collapse"
                aria-labelledby="heading3"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    Hardware requirements depend on the facility and the energy data
                    already available. AESORT can work with compatible existing systems
                    and, where required, additional monitoring technologies.
                </div>
            </div>
        </div>


        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading4">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse4"
                    aria-expanded="false"
                    aria-controls="collapse4">
                    <span class="faq-number">04</span>
                    What payment options are available for AESORT services?
                </button>
            </h2>

            <div id="collapse4"
                class="accordion-collapse collapse"
                aria-labelledby="heading4"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    Payment arrangements depend on the AESORT service or solution
                    selected. Commercial clients can discuss applicable pricing,
                    invoicing, and payment terms with the AESORT team before
                    proceeding.
                </div>
            </div>
        </div>


        <!-- FAQ 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading5">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse5"
                    aria-expanded="false"
                    aria-controls="collapse5">
                    <span class="faq-number">05</span>
                    Does AESORT support businesses outside Canada?
                </button>
            </h2>

            <div id="collapse5"
                class="accordion-collapse collapse"
                aria-labelledby="heading5"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    AESORT is designed for commercial energy-management requirements
                    and can assess opportunities based on the facility, available
                    energy data, existing infrastructure, and applicable requirements.
                    Contact the AESORT team to discuss availability for your location.
                </div>
            </div>
        </div>


        <!-- FAQ 6 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading6">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse6"
                    aria-expanded="false"
                    aria-controls="collapse6">
                    <span class="faq-number">06</span>
                    Can an AESORT service or project be modified or cancelled?
                </button>
            </h2>

            <div id="collapse6"
                class="accordion-collapse collapse"
                aria-labelledby="heading6"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    Changes or cancellations depend on the service, project stage,
                    and applicable agreement. Clients should contact the AESORT team
                    as early as possible to discuss any requested changes or
                    cancellation.
                </div>
            </div>
        </div>


        <!-- FAQ 7 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading7">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse7"
                    aria-expanded="false"
                    aria-controls="collapse7">
                    <span class="faq-number">07</span>
                    Can AESORT use our existing energy records?
                </button>
            </h2>

            <div id="collapse7"
                class="accordion-collapse collapse"
                aria-labelledby="heading7"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    Yes. Available energy records and consumption data can be used to
                    understand usage patterns, assess energy performance, and identify
                    opportunities for improvement.
                </div>
            </div>
        </div>


        <!-- FAQ 8 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading8">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse8"
                    aria-expanded="false"
                    aria-controls="collapse8">
                    <span class="faq-number">08</span>
                    What kind of reporting and insights does AESORT provide?
                </button>
            </h2>

            <div id="collapse8"
                class="accordion-collapse collapse"
                aria-labelledby="heading8"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    AESORT provides energy performance information, consumption
                    analysis, reporting, and data-driven insights that can help
                    businesses track performance, identify inefficiencies, and support
                    practical energy-efficiency decisions.
                </div>
            </div>
        </div>


        <!-- FAQ 9 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading9">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse9"
                    aria-expanded="false"
                    aria-controls="collapse9">
                    <span class="faq-number">09</span>
                    How can I reset my password?
                </button>
            </h2>

            <div id="collapse9"
                class="accordion-collapse collapse"
                aria-labelledby="heading9"
                data-bs-parent="#faq_accordion">

                <div class="accordion-body">
                    Select <strong>Forgot Password</strong> on the Login page and enter
                    the phone number associated with your account. A verification OTP
                    will be sent to your registered phone number. Enter the OTP and
                    follow the instructions to create a new password.
                </div>
            </div>
        </div>

    </div>
</div>

  </div>
</div>






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


<script>
  const faqs = document.querySelectorAll(".faq-item");

  faqs.forEach((faq) => {
    faq.classList.add("active");

    const question = faq.querySelector(".faq-question");

    question.style.pointerEvents = "none";
    question.style.cursor = "default";
  });
</script>
@include('include.footer')