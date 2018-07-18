<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailMember;
use Illuminate\Support\Facades\Mail;

class MessagingController extends Controller
{
    public function indexEmail(){
        return view('messaging.email');
    }
    public function indexSMS(){
        return view('messaging.sms');
    }
    public function sendEmail(Request $request){

        Mail::to($request->to)
            //->cc($request->cc)
            //->bcc($request->bcc)
            ->send(new MailMember($request));

        return redirect()
                ->back()
                ->with('status','Mail Successfully Sent!');
    }
    public function sendSMS(Request $request){

        //print_r($_POST);exit();

        $sender = config('app.name');


        $message = urlencode($request->message);
        $to = $request->to;
        
        //$response = $this->curl_get("http://api.smartsmssolutions.com/smsapi.php?username=iamblizzyy@gmail.com&password=revelation1&sender=ASAP&recipient={$to}&message={$message}",[],[]);
        $response = file_get_contents("http://api.smartsmssolutions.com/smsapi.php?username=iamblizzyy@gmail.com&password=revelation1&sender={$sender}&recipient={$to}&message={$message}");
        
        if (substr($response,0,2) == "OK")
        {
            return redirect()->back()->with('status','Message Successfullt Sent!');
        }
        else {

            return redirect()->back()->with('status','FAILURE!! Could not Send Message.'.$response);

        }
    
    }
}
