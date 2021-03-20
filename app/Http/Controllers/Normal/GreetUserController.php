<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GreetUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($locale, User $user)
    {
        return view('greet', ['user' => $user]);
    }
}
