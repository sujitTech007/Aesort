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
    <section class="faq-container">

      <h2 class="faq-title">Frequently Asked Questions</h2>

      <!-- FAQ 1 -->
      <div class="faq-item">
        <button class="faq-question">
          What does AESORT do?
        </button>

        <div class="faq-answer">
          AESORT helps commercial businesses understand energy usage,
          identify inefficiencies, and make informed decisions to improve
          energy efficiency, manage costs, and support sustainability.
        </div>
      </div>

      <!-- FAQ 2 -->
      <div class="faq-item">
        <button class="faq-question">
          What is involved in getting started with AESORT?
        </button>

        <div class="faq-answer">
          The process begins by understanding your facility, energy usage,
          existing systems, and energy-management goals. Based on these
          requirements, AESORT can determine an appropriate approach for
          monitoring, analysis, and optimization.
        </div>
      </div>

      <!-- FAQ 3 -->
      <div class="faq-item">
        <button class="faq-question">
          Does AESORT require new hardware?
        </button>

        <div class="faq-answer">
          Hardware requirements depend on the facility and the energy data
          already available. AESORT can work with compatible existing systems
          and, where required, additional monitoring technologies.
        </div>
      </div>

      <!-- FAQ 4 -->
      <div class="faq-item">
        <button class="faq-question">
          What payment options are available for AESORT services?
        </button>

        <div class="faq-answer">
          Payment arrangements depend on the AESORT service or solution
          selected. Commercial clients can discuss applicable pricing,
          invoicing, and payment terms with the AESORT team before
          proceeding.
        </div>
      </div>

      <!-- FAQ 5 -->
      <div class="faq-item">
        <button class="faq-question">
          Does AESORT support businesses outside Canada?
        </button>

        <div class="faq-answer">
          AESORT is designed for commercial energy-management requirements
          and can assess opportunities based on the facility, available
          energy data, existing infrastructure, and applicable requirements.
          Contact the AESORT team to discuss availability for your location.
        </div>
      </div>

      <!-- FAQ 6 -->
      <div class="faq-item">
        <button class="faq-question">
          Can an AESORT service or project be modified or cancelled?
        </button>

        <div class="faq-answer">
          Changes or cancellations depend on the service, project stage,
          and applicable agreement. Clients should contact the AESORT team
          as early as possible to discuss any requested changes or
          cancellation.
        </div>
      </div>

      <!-- FAQ 7 -->
      <div class="faq-item">
        <button class="faq-question">
          Can AESORT use our existing energy records?
        </button>

        <div class="faq-answer">
          Yes. Available energy records and consumption data can be used to
          understand usage patterns, assess energy performance, and identify
          opportunities for improvement.
        </div>
      </div>

      <!-- FAQ 8 -->
      <div class="faq-item">
        <button class="faq-question">
          What kind of reporting and insights does AESORT provide?
        </button>

        <div class="faq-answer">
          AESORT provides energy performance information, consumption
          analysis, reporting, and data-driven insights that can help
          businesses track performance, identify inefficiencies, and support
          practical energy-efficiency decisions.
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-question">
         How can I reset my password?
        </button>

        <div class="faq-answer">
         Select <strong>Forgot Password</strong> on the Login page and enter the phone number associated with your account. A verification OTP will be sent to your registered phone number. Enter the OTP and follow the instructions to create a new password.
        </div>
      </div>



    </section>
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