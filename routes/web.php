<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'loginWeb'])->name('login.attempt');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'regForm'])->name('register');
// Route::post('register', [RegisterController::class, 'attempt'])->name('register.attempt');

Route::get('/', [HomeController::class, 'index']);

Route::get('password-recovery', function () {
    return view('client.auth.password-recovery');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
