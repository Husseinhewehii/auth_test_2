<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAttemptRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function loginAttempt(LoginAttemptRequest $request)
    {
        $data = request()->except(['_token']);
        if (Auth::attempt($data)) {
            return redirect(LaravelLocalization::localizeURL(route('admin.home.index')));
        }
        return redirect()->route('admin.login')->withInput()->withErrors([
            'password' => 'Email Or Password Is Incorrect'
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
