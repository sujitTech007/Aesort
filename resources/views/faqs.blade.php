@php
    $pageTitle = $pageTitle ?? 'FAQs – Aesort';
    $currentPage = $currentPage ?? 'faqs';
@endphp
@include('include.header')



  
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

                            <li class="breadcrumb-item active" aria-current="page"> FAQs</li>
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

    <div class="faq-item">
      <button class="faq-question">
        What payment methods do you accept?
        <span class="faq-icon">+</span>
      </button>
      <div class="faq-answer">
        We accept all major credit and debit cards, PayPal, and UPI payments. 
        For business clients, we also offer invoice-based payments.
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">
        How can I reset my password?
        <span class="faq-icon">+</span>
      </button>
      <div class="faq-answer">
        Go to the login page and click on “Forgot Password.” 
        Enter your registered email address, and you’ll receive a password reset link.
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">
        Do you offer international shipping?
        <span class="faq-icon">+</span>
      </button>
      <div class="faq-answer">
        Yes, we offer worldwide shipping. Delivery times and costs vary depending on the location.
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-question">
        Can I cancel or modify my order?
        <span class="faq-icon">+</span>
      </button>
      <div class="faq-answer">
        Orders can be modified or canceled within 2 hours of placement. 
        Contact our support team immediately to make changes.
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
                <span>Maximize Commercial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Business</span>
                <span>Reliable 24×7 Monitoring</span>

            </div>

            <div class="scrolling-content">
                <span>Optimize Your Energy Usage</span>
                <span>Maximize Commercial Savings</span>
                <span>Powering a Greener Future</span>
                <span>Smart Energy, Smart Business</span>
                <span>Reliable 24×7 Monitoring</span>

            </div>
        </div>
    </div>
</div>

<script>
    const faqs = document.querySelectorAll(".faq-item");

    faqs.forEach((faq) => {
      faq.querySelector(".faq-question").addEventListener("click", () => {
        faqs.forEach((item) => {
          if (item !== faq) item.classList.remove("active");
        });
        faq.classList.toggle("active");
      });
    });
  </script>
@include('include.footer')