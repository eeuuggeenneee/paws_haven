<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Throwable;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->getEmail())->first();
           
            if ($user == null) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'type' => 0,
                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }
            Auth::login($user);
            return redirect()->intended('dashboard');

        } catch (Throwable $r) {
            abort(404);
        }
    }
}
