<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DateTime;

class RecoverPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest');
    }*/
    public function index(){
    	return view('auth.passwords.recover');
    }
    public function recover(){
    	$token = '5f48ff45rg488g455sd8w8wf';
    	return view('auth.passwords.recover', ['token'=>$token]);
    }

    public function reset(Request $request){
      $token = $request->token;
      return view('auth.passwords.reset', ['token' =>$token]);
    }
}
