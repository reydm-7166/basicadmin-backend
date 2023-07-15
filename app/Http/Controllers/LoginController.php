<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia('Admin/Login');
    }

    public function authenticate(LoginRequest $loginRequest)
    {

        if (Auth::attempt(['email' => $loginRequest->user, 'password' => 'password'], $loginRequest->remember)) {
            return redirect()->intended('admin/dashboard');
        }
        if (Auth::attempt(['username' => $loginRequest->user, 'password' => 'password'], $loginRequest->remember)) {
            return redirect()->intended('admin/dashboard');
        }
        return back()->withErrors([
            'credentials_error' => ['The provided user/email and password does not match our records.']
        ]);
    }

}
