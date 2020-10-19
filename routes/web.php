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

Route::get('/', function () {
    return view('client.dashboard');
});
Route::get('login', function () {
    return view('client.auth.login');
});
Route::get('password-recovery', function () {
    return view('client.auth.password-recovery');
});
