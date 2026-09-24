<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordResetController extends Controller
{
    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkByPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'country_code' => 'required'
        ]);

        $phone = $request->phone;
        $countryCode = $request->country_code;

        $user = User::where('phone', $phone)
                    ->where('country_code', $countryCode)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'phone' => 'No user found with this phone and country code.'
            ]);
        }

        // Store session
        session([
            'phone_for_otp' => $phone,
            'country_code_for_otp' => $countryCode,
            'otp_next' => 'reset'
        ]);

        $this->sendOtp($countryCode, $phone);

        return redirect()->route('pass.reset.otp')
            ->with('status', 'Password reset OTP sent successfully.');
    }


    public function passwordResetOtp(Request $request)
    {
        $phone = session('phone_for_otp');
        $country_code = session('country_code_for_otp');

        return view('auth.forget-pass-otp', compact('phone','country_code'));
    }



    private function sendOtp($countryCode, $phone)
    {
        $twilioPhone = $countryCode . ltrim($phone,'0');

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken  = env('TWILIO_AUTH_TOKEN');
        $verifySid  = env('TWILIO_VERIFY_SID');

        $url = "https://verify.twilio.com/v2/Services/{$verifySid}/Verifications";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'To' => $twilioPhone,
            'Channel' => 'sms'
        ]));

        curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }



    public function passwordResetOtpVerify(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'country_code' => 'required',
            'otp' => 'required'
        ]);

        $phone = $request->phone;
        $countryCode = $request->country_code;

        $user = User::where('phone',$phone)
                    ->where('country_code',$countryCode)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'phone' => 'No user found.'
            ]);
        }

        $twilioPhone = $countryCode . ltrim($phone,'0');

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken  = env('TWILIO_AUTH_TOKEN');
        $verifySid  = env('TWILIO_VERIFY_SID');

        $url = "https://verify.twilio.com/v2/Services/{$verifySid}/VerificationCheck";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST,true);

        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query([
            'To'=>$twilioPhone,
            'Code'=>$request->otp
        ]));

        curl_setopt($ch, CURLOPT_USERPWD,"{$accountSid}:{$authToken}");

        $response = curl_exec($ch);

        $twilioResponse = json_decode($response,true);

        curl_close($ch);

        if (!isset($twilioResponse['status']) || $twilioResponse['status'] !== 'approved') {
            return back()->withErrors([
                'otp' => 'Invalid or expired OTP.'
            ]);
        }

        return redirect()->route('password.reset.phone.form')
            ->with('success','OTP verified successfully.');
    }



    public function showResetFormByPhone(Request $request)
    {
        $phone = session('phone_for_otp');
        $country_code = session('country_code_for_otp');

        return view('auth.reset-password-phone', compact('phone','country_code'));
    }



    public function resetByPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'country_code' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('phone',$request->phone)
                    ->where('country_code',$request->country_code)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'phone'=>'No user found for this phone.'
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        session()->forget(['phone_for_otp','country_code_for_otp']);

        return redirect()->route('login')
            ->with('status','Password has been reset. You may login now.');
    }
}
