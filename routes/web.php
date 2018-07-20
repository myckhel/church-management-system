<?php

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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware' => [ 'auth'] ], function(){

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/member/register', 'MemberController@create')->name('member.register.form');
    Route::post('/member/register', 'MemberController@store')->name('member.register');
    Route::get('/members/all', 'MemberController@index')->name('members.all');
    Route::get('/member/profile/{id}', 'MemberController@show')->name('member.profile');
    Route::get('/branches', 'BranchController@index')->name('branches');
    Route::get('/attendance', function(){
        return view('attendance.mark');
    })->name('attendance');
    Route::post('/attendance', 'AttendanceController@store')->name('attendance.selectDate');
    Route::post('/attendance/submit', 'AttendanceController@store')->name('attendance.submit');
    //Route::post('/attendance/mark/submit', 'AttendanceController@store')->name('attendance.mark.submit');
    Route::get('/attendance/analysis', 'AttendanceController@analysis')->name('attendance.analysis');
    Route::get('/attendance/view', function () {
        return view('attendance.view');
    })->name('attendance.view.form');
    Route::post('/attendance/view', 'AttendanceController@show')->name('attendance.view');
    Route::get('/attendance/view/{date}', 'AttendanceController@show')->name('attendance.view.custom');
    Route::get('/collection/offering', function () {
        return view('collection.offering');
    })->name('collection.offering');
    Route::post('/collection/save', 'CollectionController@store')->name('collection.save');
    Route::get('/collection/report', 'CollectionController@report')->name('collection.report');
    Route::get('/calendar', 'EventController@index')->name('calendar');
    Route::post('/calendar', 'EventController@store')->name('calendar.update');
    Route::get('/get-relative/{search_term}', 'MemberController@getRelative')->name('relative');


    Route::get('/groups', 'GroupController@index')->name('groups');
    Route::post('/group/create', 'GroupController@store')->name('group.create');
    Route::get('/group/{id}', 'GroupController@show')->name('group.view');
    Route::post('group/{id}/add', 'GroupController@add_member')->name('group.add.member');
    Route::get('group/{id}/delete', 'GroupController@destroy')->name('group.delete');
    Route::get('group/{id}/{group_id}/remove', 'GroupController@remove_member')->name('group.remove.member');


    Route::get('/messaging/email', 'MessagingController@indexEmail')->name('email');
    Route::get('/messaging/sms', 'MessagingController@indexSMS')->name('sms');
    Route::post('/messaging/email/send', 'MessagingController@sendEmail')->name('sendMail');
    Route::post('/messaging/sms/send', 'MessagingController@sendSMS')->name('sendSMS');
});

Route::get('/admin/login', function () {
    return view('auth.login');
});
Route::get('/registerr', function () {
    return view('auth.register');
});
