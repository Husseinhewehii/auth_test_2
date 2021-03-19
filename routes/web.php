<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home')->name('home');

Route::namespace('normal')->group(function(){
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/register', 'AuthController@registerAttempt')->name('register.attempt');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/login/attempt', 'AuthController@loginAttempt')->name('login.attempt');
});

Route::namespace('normal')->middleware('auth')->group(function(){
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::prefix('admin')->attribute('namespace', 'Admin')->group(function(){
    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login/attempt', 'AuthController@loginAttempt')->name('admin.login.attempt');
});

Route::prefix('admin')->attribute('namespace', 'Admin')->middleware('auth')->group(function(){
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');
});

