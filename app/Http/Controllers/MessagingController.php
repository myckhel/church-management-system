<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailMember;
use App\Mail\TickectEmail;
use Illuminate\Support\Facades\Mail;

class MessagingController extends Controller
{
    public function indexEmail(){
      $user = \Auth::user();
      $members = \App\Member::where('branch_id', $user->branchcode)->get(); //$user->isAdmin() ? \App\Member::all() :
        return view('messaging.email', compact('members'));
    }
    public function indexSMS(){

      $user = \Auth::user();
      $members = \App\Member::where('branch_id', $user->branchcode)->get(); //$user->isAdmin() ? \App\Member::all() : 
        return view('messaging.sms', compact('members'));
    }
    public function sendEmail(Request $request){
        foreach ($request->to as $to){
          Mail::to($to)//$request->to)
              //->cc($request->cc)
              //->bcc($request->bcc)
              ->send(new MailMember($request));
            }

        return redirect()
                ->back()
                ->with('status','Mail Successfully Sent!');
    }
    public function sendSMS(Request $request){

        //print_r($_POST);exit();

        $sender = config('app.name');

        foreach ($request->to as $to){
          $message = urlencode($request->message);
          //$to = $request->to;

          //$response = $this->curl_get("http://api.smartsmssolutions.com/smsapi.php?username=iamblizzyy@gmail.com&password=revelation1&sender=ASAP&recipient={$to}&message={$message}",[],[]);
          $response = file_get_contents("http://api.smartsmssolutions.com/smsapi.php?username=iamblizzyy@gmail.com&password=revelation1&sender={$sender}&recipient={$to}&message={$message}");
        }
        if (substr($response,0,2) == "OK")
        {
            return redirect()->back()->with('status','Message Successfullt Sent!');
        }
        else {

            return redirect()->back()->with('status','FAILURE!! Could not Send Message.'.$response);
        }

    }

    public function inbox(){
      $users = \Auth::user();
      $user = \Auth::user();
      $members = \App\User::where('branchcode', '!=', $users->branchcode)->get();
      $msg_user = \App\User::selectRaw('SUM(case when messagings.seen = 0 then 1 else 0 end) as count, users.branchname, users.branchcode')->
      leftjoin('messagings', 'messagings.msg_from', '=', 'users.branchcode')->where('messagings.msg_to', '>', '0')->
      where('messagings.msg_to', '=', $users->branchcode)->where('messagings.msg_from', '!=', $users->branchcode)->
      groupby('users.branchname','users.branchcode')->get();

      return view('messaging.inbox', compact('members', 'users', 'msg_user'));
    }

    public function sendMessage(Request $request){
      $to = $request->to;
      $from = $request->from;
      $message = $request->message;

      foreach($to as $branch){
        $sql = "INSERT INTO messagings(msg_to,msg_from,msg) VALUES('$branch', '$from','$message')";
        \DB::insert($sql);
      }
      return redirect()->back()->with('status', 'Message Sent Successfully');
    }

    public function getMsg(Request $request){
      $from = $request->from;
      $to = $request->to;
      // $sql = "UPDATE messagings
      //   SET    messagings.seen = 1
      //   WHERE  messagings.msg_to = $to AND (messagings.msg_from = $from AND messagings.msg_to = $to)";
      //   \DB::update($sql);

      $chat = \App\User::selectRaw('messagings.*, users.branchname')->
      leftjoin('messagings', 'messagings.msg_from', '=', 'users.branchcode')->where('messagings.msg_to', '=', $from)->
      where('messagings.msg_from', '=', $to)->orWhere('messagings.msg_from', '=', $from)->where('messagings.msg_to', '=', $to)->
      groupby('users.branchname','users.branchcode','messagings.id','messagings.msg_to','messagings.msg_from','messagings.msg','messagings.date','messagings.seen')->orderby('messagings.date')->get();


      return response()->json(['success' => true, 'chats' => $chat]);
    }

    public function reply(Request $request){
      $to = $request->to;
      $from = $request->from;
      $message = $request->message;
      $sql = "INSERT INTO messagings(msg_to,msg_from,msg) VALUES('$to', '$from','$message')";
      \DB::insert($sql);
      return response()->json(['success' => true]);
    }

    public function get_inbox(){
      $users = \Auth::user();
      //$members = \App\User::where('branchcode', '!=', $users->branchcode)->get();

      $msg_user = \App\User::selectRaw('count(messagings.id) as count, users.branchname, users.branchcode')->
      leftjoin('messagings', 'messagings.msg_from', '=', 'users.branchcode')->where('messagings.id', '>', '0')->
      where('messagings.msg_to', '=', $users->branchcode)->where('messagings.msg_from', '!=', $users->branchcode)->
      groupby('users.branchname','users.branchcode')->get();

      return response()->json(['success' => true, 'chats' => $msg_user]);
      //view('messaging.inbox', compact('members', 'users', 'msg_user'));
    }

    public function get_users(){
      $user = \Auth::user();
      $branches = \App\User::select('branchname', 'branchcode')->where('branchcode', '!=', $user->branchcode)->get();
      return response()->json(['success' => true, 'chats' => $branches]);
    }

    public function indexticket(){
      return view('ticketing.ticket');
    }

    //kenny
   public function sendTickeeeet(Request $request)
   {
    // $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
    // ContactUS::create($request->all());
    $randid= mt_rand(13, rand(100, 99999990));
            $error_code = $request->error_code;
            $error_name = $request->error_name;
            $severity = $request->severity;
            $servicelevel = $request->servicelevel;
            $time = $request->time;
            $date = $request->date;
             $full_name = $request->full_name;
            $phone_number = $request->phone_number;
            $email = $request->email;
             $msg= $request->message;
    Mail::send('email',
      array('TicketID'=>$randid,'ErrorCode'=>$error_code,'ErrorName'=>$error_name,'Severity'=>$severity,'ServiceLevel'=>$servicelevel,'Time'=> $time,'Date'=>$date,'Name'=>$full_name,'PhoneNumber'=>$phone_number,'Email'=>$email,'kmessage'=>$msg), function($message) use($request)
   {
       $message->from($request->email,$request->full_name);
       $message->to('myckhel1@hotmail.com', 'Hoffenheim Technologies Test Single Email')->subject('From Support Ticket');
   });

        return redirect()->back()->with('status', "Ticket Email Sent. Check your inbox.");
   }


  public function sendTicket(Request $request){
        $this->validate($request, [ 'error_code' => 'required','error_name' => 'required','severity' => 'required','servicelevel' => 'required','time' => 'required','date' => 'required','full_name' => 'required','phone_number' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
      //  foreach ($request->to as $to){
          Mail::to('ticket@cms.hoffenheimtechnologies.tech')//$request->to)
              //->cc($request->cc)
              //->bcc($request->bcc)
              ->send(new TickectEmail($request));
          //  }
  $message ='Ticket  #'.$request->TicketID  .'   successfully Created!                                                                          Our Technical Support Team Will Get Back To You Soon Thank You. Please Refer To The Above Ticket  #   For Your Future Reference.';

        return redirect()
                ->back()
                ->with('status', $message);
    }

    public function demo(Request $request){
      $to = $request->to;
      $randid= mt_rand(13, rand(100, 99999990));
       $error_code = $request->error_code;
       $error_name = $request->error_name;
       $severity = $request->severity;
       $servicelevel = $request->servicelevels;
       $time = $request->time;
       $date = $request->date;
        $full_name = $request->full_name;
       $phone_number = $request->phone_number;
       $email = $request->email;
        $message= $request->message;
        Mail::to($email)//$request->to)
            //->cc($request->cc)
            //->bcc($request->bcc)
            ->send(new TickectEmail($request));

      return redirect()
              ->back()
              ->with('status','Mail Successfully Sent!');
      /*$objDemo = new \stdClass();
       $objDemo->demo_one = 'Demo One Value';
       $objDemo->demo_two = 'Demo Two Value';
       $objDemo->sender = 'myckhel1@gmail.com';
       $objDemo->receiver = 'ReceiverUserName';
       echo view('mails.ticket');

       Mail::to("kakpan@hoffenheimtechnologies.com")->send(new TickectEmail($objDemo));*/
    }
}
