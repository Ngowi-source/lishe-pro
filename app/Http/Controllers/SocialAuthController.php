<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{

    public function redirect($social)
    {
        return Socialite::with($social)->redirect();
    }

    public function callback($social)
    {
        $auth_user = Socialite::with($social)->user();

        $account = User::whereProvider($social)->whereProviderId($auth_user->id)->first();
        $userEmailExists = User::whereEmail($auth_user->email)->first();

        if ($userEmailExists && !$account)
        {
            return redirect('/login')->with(['socialerror'=> 'The email for this social account has already been registered with another user!']);
        }
        elseif ($account) {
            $user = $account;
            Auth::login($user, true);
            return redirect('/')->with(['loginsuccess'=> 'Welcome ']);
        }
        else {

            $fn = strtok($auth_user->name, " ");
            $ln = str_replace($fn, '', $auth_user->name);

            $user = User::create(
                [
                    'provider' => $social,
                    'provider_id' => $auth_user->id,
                    'email' => $auth_user->email,
                    'firstname' => $fn,
                    'lastname' => $ln,
                    'status' => 1
                ]
            );

            Auth::login($user, true);
            return redirect('/')->with(['loginsuccess'=> 'Welcome ']);
        }

    }
}
