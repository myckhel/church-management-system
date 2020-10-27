<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', fn (Request $request) => $request->user());

Route::group(['middleware' => 'guest'], function () {
  Route::post('/login',     [LoginController::class, 'login']);
  Route::post('/register',  [RegisterController::class, 'register']);
});

Route::group(['prefix' => 'churches'], function () {
  Route::post('/login',     [ChurchController::class, 'login']);
});

Route::group(['middleware' => ['auth:api']], function () {
  Route::resource('churches',  ChurchController::class)->only(['index', 'store']);
  Route::post('/churches/{church}/auth',     [ChurchController::class, 'auth']);
  Route::apiResources([
  ]);
  Route::get('whoami',                 [UserController::class, 'whoami']);
});

Route::group(['middleware' => ['auth:api:member', 'role:super-admin|admin']], function () {
  Route::apiResources([
    'members' =>  MemberController::class,
  ]);
  Route::get('churches/whoami',                 [ChurchController::class, 'whoami']);
});
