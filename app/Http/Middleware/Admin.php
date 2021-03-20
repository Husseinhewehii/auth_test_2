<?php

namespace App\Http\Middleware;

use App\Constants\UserTypes;
use Closure;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('Authorization', $request->headers->get('Auth'));
        if (auth()->user()) {
            if (auth()->user()->type != UserTypes::ADMIN) {
                return redirect(LaravelLocalization::localizeURL(route('logout')));
            }
            return $next($request);
        }
        
        return redirect(LaravelLocalization::localizeURL(route('admin.login')));
    }
}
