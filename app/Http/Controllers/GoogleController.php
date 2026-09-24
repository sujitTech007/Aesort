<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->stateless()   // Important fix
            ->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if user already exists
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Create user
                $user = User::create([
                    'name'      => $googleUser->name,
                    'email'     => $googleUser->email,
                    'password'  => bcrypt(uniqid()),
                    'google_id' => $googleUser->id,
                    'image'     => $googleUser->avatar,
                    'role'      => '1',
                ]);
            }

            Auth::login($user);

            return redirect()->route('client.dashboard')->with('success', 'Login successfully');

        } catch (\Exception $e) {
             dd($e);
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
