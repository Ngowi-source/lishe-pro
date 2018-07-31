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

    public function callbackfb(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = Social::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            $user = $account->user;
        }else
        {
            $account = new Social([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $auth_user = Socialite::driver('facebook')->user();
            $fn = strtok($auth_user->name, " ");
            $ln = str_replace($fn, '', $auth_user->name);

            $user = User::create(
                [
                    'email' => $auth_user->email,
                    'token' => $auth_user->token,
                    'firstname'  =>  $fn,
                    'lastname' => $ln,
                    'status' => 1
                ]
            );

            $account->user()->associate($user);
            $account->save();
        }


        Auth::login($user, true);
        return redirect()->to('/');
    }
}
