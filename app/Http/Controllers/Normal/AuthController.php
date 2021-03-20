<?php

namespace App\Http\Controllers\Normal;

use App\Constants\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginAttemptRequest;
use App\Http\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;


    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(){
        return view('normal.auth.login');
    }

    public function loginAttempt(LoginAttemptRequest $request)
    {
        $data = request()->except(['_token']);
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withInput()->withErrors([
            'password' => 'Email Or Password Is Incorrect'
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        return view('normal.auth.register');
    }

    public function registerAttempt(Request $request)
    {
        $request['type'] = UserTypes::NORMAL;
        $user = $this->authService->registerFromRequest($request);
        auth()->login($user);
        session()->flash('success', trans('register_success_message'));

        return redirect(route('home'))->with('success', 'new user');
    }
}
