@php
$pageTitle = $pageTitle ?? 'OTP Verification – Aesort';
$currentPage = $currentPage ?? 'login';
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
<h2 class="text-anime wow fadeInUp">Enter OTP</h2>
</div>

<div class="contact-form wow fadeInUp" data-wow-delay="0.75s">

<!-- ALERT MESSAGE -->
<div id="otp-alert"></div>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<form id="otpForm" action="{{ route('otp.verify') }}" method="POST">
@csrf

<div class="row">

@php
$phone = session('phone_for_otp') ?? old('phone') ?? request('phone') ?? '';
$countryCode = session('phone_code') ?? '';

$onlyDigits = preg_replace('/\D/', '', $phone);
$last4 = strlen($onlyDigits) > 4 ? substr($onlyDigits, -4) : $onlyDigits;

$masked = $countryCode . 'xxxx' . $last4;
@endphp

<div class="form-group col-md-12 mb-2">
<p class="text-center">
OTP sent to <strong>{{ $masked }}</strong>
</p>

<input type="hidden" name="phone" value="{{ $phone }}">
</div>

<div class="form-group col-md-12 mb-4">

<div style="display:flex;gap:10px;justify-content:center">

<input maxlength="1" class="otp-box form-control" style="width:60px;text-align:center;font-size:20px;" />
<input maxlength="1" class="otp-box form-control" style="width:60px;text-align:center;font-size:20px;" />
<input maxlength="1" class="otp-box form-control" style="width:60px;text-align:center;font-size:20px;" />
<input maxlength="1" class="otp-box form-control" style="width:60px;text-align:center;font-size:20px;" />

</div>

<input type="hidden" name="otp" id="otp_hidden">

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

<p>
Didn't receive code?
<a href="javascript:void(0)" id="resendOtpBtn">Resend OTP</a>
</p>

<span id="resendTimer" style="color:#666"></span>

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

document.addEventListener('DOMContentLoaded',function(){

/* OTP INPUT BOX LOGIC */

const boxes=document.querySelectorAll('.otp-box');

boxes.forEach((box,index)=>{

box.addEventListener('input',function(){

this.value=this.value.replace(/[^0-9]/g,'');

if(this.value && index<boxes.length-1){
boxes[index+1].focus();
}

});

box.addEventListener('keydown',function(e){

if(e.key==="Backspace" && !this.value && index>0){
boxes[index-1].focus();
}

});

});

/* FORM SUBMIT */

const form=document.getElementById('otpForm');

form.addEventListener('submit',function(e){

const otp=Array.from(boxes).map(b=>b.value).join('');

document.getElementById('otp_hidden').value=otp;

if(otp.length!==4){

e.preventDefault();

document.getElementById('otp-alert').innerHTML=
'<div class="alert alert-danger">Please enter 4 digit OTP</div>';

}

});


/* RESEND OTP */

let resendBtn=document.getElementById("resendOtpBtn");
let resendTimer=document.getElementById("resendTimer");
let phone=document.querySelector("input[name='phone']").value;

function startTimer(seconds){

resendBtn.style.pointerEvents="none";
resendBtn.style.opacity="0.5";

let remaining=seconds;

let interval=setInterval(()=>{

resendTimer.innerHTML="Resend OTP in "+remaining+"s";

remaining--;

if(remaining<0){

clearInterval(interval);

resendTimer.innerHTML="";

resendBtn.style.pointerEvents="auto";
resendBtn.style.opacity="1";

}

},1000);

}


/* CLICK RESEND */

resendBtn.addEventListener("click",function(){

fetch("{{ route('otp.resend') }}",{

method:"POST",

headers:{
"Content-Type":"application/json",
"X-CSRF-TOKEN":"{{ csrf_token() }}"
},

body:JSON.stringify({
phone:phone
})

})

.then(res=>res.json())

.then(data=>{

let alertBox=document.getElementById("otp-alert");

if(data.success){

alertBox.innerHTML=
'<div class="alert alert-success">OTP has been resent successfully</div>';

startTimer(30);

}else{

alertBox.innerHTML=
'<div class="alert alert-danger">Failed to resend OTP</div>';

}

})

.catch(()=>{

document.getElementById("otp-alert").innerHTML=
'<div class="alert alert-danger">Server error. Please try again.</div>';

});

});


/* START TIMER ON LOAD */

startTimer(30);

});

</script>