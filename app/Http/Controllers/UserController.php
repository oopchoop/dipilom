<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        return Auth::user();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function registr(RegistrationRequest $request)
    {
        $requests = $request->validated();
        $requests['password'] = Hash::make($requests['password']);

        User::create($requests);
        return redirect('/autorization');
    }

    public function autoriz(AutorizationRequest $request)
    {
        if($request->validated())
        {
            $requests = $request->validated();

            if(Auth::attempt($requests))
            {
                return redirect('/');
            }
        }
    }
}
