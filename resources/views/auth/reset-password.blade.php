@php
    $pageTitle = $pageTitle ?? 'Reset-password – Aesort';
    $currentPage = $currentPage ?? 'reset-password';
@endphp
@include('include.header')
<div class="why-chooseus-layout2">
    <div class="container-fluid">
        <div class="row no-gap row-equal-height">
            <div class="col-lg-6">
                <!-- Left Image / Video Section -->
                <div class="why-choose-us-img-box">
                    <div class="video-play-button">
                        <a href="https://www.youtube.com/watch?v=Y-x0efG1seA" class="popup-video">
                            <img src="images/play-green.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-form-box">
                    <div class="section-title">
                        <h2 class="text-anime wow fadeInUp">Reset Password</h2>
                    </div>

                    <div class="contact-form wow fadeInUp" data-wow-delay="0.75s">
                        <form id="resetPasswordForm" action="{{ route('password.reset') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token ?? '' }}">
                            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                            <div class="row">

                                <!-- New Password -->
                                <div class="form-group col-md-12 mb-4">
                                    <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group col-md-12 mb-4">
                                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm new password" required>
                                    @error('password_confirmation')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Reset Button -->
                                <div class="col-md-12 text-center mb-3">
                                    <button type="submit" class="btn-default">Reset Password</button>
                                </div>

                                <!-- Back to Login -->
                                <div class="col-md-12 text-center">
                                    <p>Remembered your password? <a href="{{ route('login') }}">Login</a></p>
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
