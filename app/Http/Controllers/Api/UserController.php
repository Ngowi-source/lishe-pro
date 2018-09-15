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
        $user = User::findOrFail($uid);

        if(!$user)
        {
            return response()->json(null,404);
        }
        return new UserRsource($user);
    }

    public function index()
    {
        $user = User::all();
        return UserRsource::collection($user);
    }

    public function delete(User $uid)
    {
        if($uid->delete())
        {
            return response()->json('user deleted', 200);
        }
        else
        {
            return response()->json('failed to delete',400);
        }
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());

        if($user)
        {
            $data = new UserRsource($user);
            return response()->json( $data, 200);
        }
        else
        {
            return response()->json('user not created', 400);
        }
    }
}
