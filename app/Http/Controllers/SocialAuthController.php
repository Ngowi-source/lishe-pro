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

        $account = User::whereEmail($auth_user->email)->first();

        if ($account) {
            $user = $account;
        }
        else
        {

            $fn = strtok($auth_user->name, " ");
            $ln = str_replace($fn, '', $auth_user->name);

            $user = User::create(
                [
                    'email' => $auth_user->email,
                    'oautoken' => $auth_user->token,
                    'firstname'  =>  $fn,
                    'lastname' => $ln,
                    'status' => 1
                ]
            );

        }

        Auth::login($user, true);
        return redirect()->to('/');
    }
}
