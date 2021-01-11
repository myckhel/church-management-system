<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GivingController;
use App\Http\Controllers\EventGivingController;
use App\Http\Controllers\SmsClientController;
use App\Http\Controllers\SmsMethodController;

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
  Route::get('groups/{group}/members',      [GroupMemberController::class, 'index']);
  Route::post('groups/{group}/members',     [GroupMemberController::class, 'store']);
  Route::resource('group_members',          GroupMemberController::class)->only(['show', 'destroy']);
  Route::apiResources([
    'members'                 =>  MemberController::class,
    'groups'                  =>  GroupController::class,
    'services'                =>  ServiceController::class,
    'events'                  =>  EventController::class,
    'attendances'             =>  AttendanceController::class,
    'givings'                 =>  GivingController::class,
    'event_givings'           =>  EventGivingController::class,
    'sms_clients'             =>  SmsClientController::class,
    'sms_methods'             =>  SmsMethodController::class,
  ]);
  Route::get('churches/whoami',   [ChurchController::class, 'whoami']);
});
