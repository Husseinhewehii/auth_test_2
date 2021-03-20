<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group([
    'prefix' => '{locale?}',
    'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', 'HomeController@home')->middleware('throttle:30,1')->name('home');

    Route::namespace('normal')->group(function(){
        Route::get('/register', 'AuthController@register')->name('register');
        Route::post('/register', 'AuthController@registerAttempt')->name('register.attempt');
        Route::get('/login', 'AuthController@login')->name('login');
        Route::post('/login/attempt', 'AuthController@loginAttempt')->name('login.attempt');
        Route::middleware('auth')->group(function(){
            Route::get('/logout', 'AuthController@logout')->name('logout');
            Route::get('/greet/{user}', 'GreetUserController')->name('greet');
        });
    });



    Route::prefix('admin')->attribute('namespace', 'Admin')->group(function(){
        Route::get('/login', 'AuthController@login')->name('admin.login');
        Route::post('/login/attempt', 'AuthController@loginAttempt')->name('admin.login.attempt');
        Route::middleware('auth')->group(function(){
            Route::get('/dashboard', 'HomeController@index')->name('admin.home.index');
            Route::resource('users', 'UserAdminsController', ['as' => 'admin'])->except('show');
            Route::resource('normals', 'UserNormalController', ['as' => 'admin', 'parameters' => [
                'normals' => 'user'
            ]])->except('show');
            Route::resource('products', 'ProductController', ['as' => 'admin']);
            Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        });
    });
});

