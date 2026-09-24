@php
    $pageTitle = $pageTitle ?? 'OTP Verification – Aesort';
    $currentPage = $currentPage ?? 'login';
@endphp
@include('include.header')

<div class="why-chooseus-layout2">
    <div class="container-fluid">
        <div class="row no-gap row-equal-height">
            <div class="col-lg-6">
                <!-- Left Image / Video Section -->
                <div class="why-choose-us-img-box">
                    <div class="video-play-button">
                        <a href="#" class="popup-video">
                            <img src="{{ asset('assets/images/play-green.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-form-box">
                    <div class="section-title">
                        <h2 class="text-anime wow fadeInUp">Enter OTP</h2>
                    </div>

                    <div class="contact-form wow fadeInUp" data-wow-delay="0.75s">
                        @if(session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif
                        <form id="otpForm" action="{{ route('pass.reset.otp.verify') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                  @php
    $phone = session('phone_for_otp') ?? old('phone') ?? request('phone') ?? '';
    $country_code = session('country_code_for_otp') ?? old('country_code') ?? '+91';

    $onlyDigits = preg_replace('/\D/', '', $phone);
    $last4 = strlen($onlyDigits) > 4 ? substr($onlyDigits, -4) : $onlyDigits;

    $maskedMiddleLen = max(0, strlen($onlyDigits) - strlen($last4));
    $masked = str_repeat('x', $maskedMiddleLen) . $last4;
@endphp

<p class="text-center">
    OTP sent to <strong>{{ $country_code }} {{ $masked }}</strong>
</p>
                                    <input type="hidden" name="phone" value="{{ $phone }}">
<input type="hidden" name="country_code" value="{{ $country_code }}">
                                </div>

                                <div class="form-group col-md-12 mb-4" style="position: relative;">
                                    <div style="display:flex; gap:10px; justify-content:center;">
                                        <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-box form-control" style="width:60px; text-align:center; font-size:20px;" />
                                        <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-box form-control" style="width:60px; text-align:center; font-size:20px;" />
                                        <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-box form-control" style="width:60px; text-align:center; font-size:20px;" />
                                        <input inputmode="numeric" pattern="[0-9]*" maxlength="1" class="otp-box form-control" style="width:60px; text-align:center; font-size:20px;" />
                                        </div>
                                    <input type="hidden" name="otp" id="otp_hidden" />
                                </div>
                                <div class="col-12 text-center">
                                    @error('otp')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center mb-3">
                                    <button type="submit" class="btn-default">Verify OTP</button>
                                </div>
                                
                                <div class="col-md-12 text-center">
                                    <p>Didn't receive code?   <a href="javascript:void(0);" id="resendOtpBtn">Resend OTP</a></p>
                                     <span id="resendTimer" style="display:block; margin-top:5px; color:#666;"></span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('include.footer')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const boxes = document.querySelectorAll('.otp-box');
        boxes.forEach((box, idx) => {
            box.addEventListener('input', (e) => {
                const val = e.target.value.replace(/[^0-9]/g, '');
                e.target.value = val;
                if (val.length === 1 && idx < boxes.length - 1) boxes[idx + 1].focus();
            });
            box.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && idx > 0) {
                    boxes[idx - 1].focus();
                }
            });
        });

        const form = document.getElementById('otpForm');
        form.addEventListener('submit', function (e) {
            const values = Array.from(boxes).map(b => b.value || '').join('');
            document.getElementById('otp_hidden').value = values;
            // If OTP length not 6, prevent submit and show inline error
            if (values.length !== 4) {
                e.preventDefault();
                // simple inline feedback
                let err = document.querySelector('.otp-inline-error');
                if (!err) {
                    err = document.createElement('div');
                    err.className = 'otp-inline-error text-danger mt-1';
                    const container = document.querySelector('.form-group.col-md-12.mb-4');
                    if (container) container.parentNode.insertBefore(err, container.nextSibling);
                }
                err.textContent = 'Please enter the 4-digit OTP.';
            }
        });
    });
</script>


<script>

    document.addEventListener('DOMContentLoaded', function () {

    let resendBtn = document.getElementById("resendOtpBtn");
    let resendTimer = document.getElementById("resendTimer");
    let phone = document.querySelector("input[name='phone']").value;

    function startTimer(seconds) {
        resendBtn.style.pointerEvents = "none";
        resendBtn.style.opacity = "0.5";

        let remaining = seconds;

        let interval = setInterval(() => {
            resendTimer.textContent = "You can resend OTP in " + remaining + "s";
            remaining--;

            if (remaining < 0) {
                clearInterval(interval);
                resendTimer.textContent = "";
                resendBtn.style.pointerEvents = "auto";
                resendBtn.style.opacity = "1";
            }
        }, 1000);
    }

    resendBtn.addEventListener("click", function () {

    fetch("{{ route('otp.resend') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ phone: phone })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Show success in alert div
            const alertContainer = document.getElementById('otp-alert');
            alertContainer.innerHTML = '<p class="alert alert-success">OTP has been resent successfully.</p>';

            startTimer(30); // disable button for 30 sec
        }
    })
    .catch(err => {
        console.error("Resend OTP error:", err);
    });
});

    startTimer(30); // start timer on page load
});

</script>
