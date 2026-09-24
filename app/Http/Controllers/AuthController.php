<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showSignup()
    {
        return view('auth.signup');
    }

     public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_code' => 'required',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_code' => $request->phone_code,
            'role' => 1,
            'password' => Hash::make($request->password),
            'status' => 0,

        ]);

        Auth::login($user);

        return redirect()->route('login.perform')->with('status', 'Registration Successful! Please login.');

    }


    /* =========================
        LOGIN
    ==========================*/

    public function login(Request $request)
    {

        $data = $request->validate([

            'phone' => 'required|string',
            'phone_code' => 'required',
            'password' => 'required|string',

        ]);

        $user = User::where('phone', $data['phone'])
                    ->where('country_code', $data['phone_code'])
                    ->first();
       

        if (!$user) {
            return back()->withErrors(['phone' => 'User not found with this phone and country code']);
        }
        
        if ($user->status == 0) {
            return back()->withErrors([
                'phone' => 'Your account is not active. Please contact the administrator.'
            ]);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password']);
        }

        session([
            'phone_for_otp' => $user->phone,
            'phone_code' => $user->country_code
        ]);

        $this->sendOtp($user->country_code, $user->phone);

        return redirect()->route('otp.form')->with('status','OTP sent successfully');

    }


    /* =========================
        SEND OTP
    ==========================*/

    private function sendOtp($code, $phone)
    {

        $twilioPhone = $code . ltrim($phone,'0');

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $verifySid = env('TWILIO_VERIFY_SID');

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


    /* =========================
        OTP FORM
    ==========================*/

    public function showOtpForm(Request $request)
    {

        $phone = session('phone_for_otp');
        $phone_code = session('phone_code');

        return view('auth.otp', compact('phone','phone_code'));

    }


    /* =========================
        VERIFY OTP
    ==========================*/

    public function verifyOtp(Request $request)
    {

        $request->validate([

            'phone' => 'required|string',
            'otp' => 'required|string',

        ]);

        $user = User::where('phone',$request->phone)->first();

        if(!$user){
            return back()->withErrors(['phone'=>'User not found']);
        }

        $twilioPhone = $user->country_code . ltrim($user->phone,'0');

        $accountSid = env('TWILIO_ACCOUNT_SID');
        $authToken = env('TWILIO_AUTH_TOKEN');
        $verifySid = env('TWILIO_VERIFY_SID');

        $url = "https://verify.twilio.com/v2/Services/{$verifySid}/VerificationCheck";

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_POST,true);

        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query([
            'To'=>$twilioPhone,
            'Code'=>$request->otp
        ]));

        curl_setopt($ch,CURLOPT_USERPWD,"{$accountSid}:{$authToken}");

        $response = curl_exec($ch);

        $twilioResponse = json_decode($response,true);

        curl_close($ch);

        if(!isset($twilioResponse['status']) || $twilioResponse['status'] !== 'approved'){
            return back()->withErrors(['otp'=>'Invalid or expired OTP']);
        }

        $user->update(['is_active'=>1]);

        Auth::login($user);

        return redirect()->route('client.dashboard')->with('success','Logged in successfully');

    }


    /* =========================
        RESEND OTP
    ==========================*/

    public function resendOtp(Request $request)
    {

        $request->validate([
            'phone'=>'required'
        ]);

        $user = User::where('phone',$request->phone)->first();

        if(!$user){
            return response()->json(['success'=>false]);
        }

        $this->sendOtp($user->country_code,$user->phone);

        return response()->json(['success'=>true]);

    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
