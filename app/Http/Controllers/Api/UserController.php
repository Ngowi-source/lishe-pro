<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Resources\User as UserRsource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($uid)
    {
        $user = User::find($uid);
        return new UserRsource($user);
    }

    public function index()
    {
        $user = User::all();
        return UserRsource::collection($user);
    }
}
