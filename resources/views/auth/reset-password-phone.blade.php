@php
    $pageTitle = $pageTitle ?? 'Reset Password – Aesort';
    $currentPage = $currentPage ?? 'reset-password';
@endphp
@include('include.header')
<div class="why-chooseus-layout2">
    <div class="container-fluid">
        <div class="row no-gap row-equal-height">
            <div class="col-lg-6">
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
                        <h2 class="text-anime wow fadeInUp">Reset Password (Phone)</h2>
                    </div>

                    <div class="contact-form wow fadeInUp" data-wow-delay="0.75s">
                       @php
    $phone = $phone ?? session('phone_for_otp') ?? request('phone') ?? '';
    $country_code = $country_code ?? session('country_code_for_otp') ?? '+91';

    $onlyDigits = preg_replace('/\D/', '', $phone);
    $last4 = strlen($onlyDigits) > 4 ? substr($onlyDigits, -4) : $onlyDigits;

    $maskedMiddleLen = max(0, strlen($onlyDigits) - strlen($last4));
    $phoneDisplay = str_repeat('x', $maskedMiddleLen) . $last4;
@endphp

<p class="text-center">
    Resetting password for <strong>{{ $country_code }} {{ $phoneDisplay }}</strong>
</p>
                        <form action="{{ route('password.reset.phone') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ $phone }}">
<input type="hidden" name="country_code" value="{{ $country_code }}">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="password" name="password" class="form-control" placeholder="New password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                                    @error('password_confirmation')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center mb-3">
                                    <button type="submit" class="btn-default">Reset Password</button>
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
