<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailMember;
use Illuminate\Support\Facades\Mail;

class MessagingController extends Controller
{
    public function indexEmail(){
      $user = \Auth::user();
      $members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->branchcode)->get();
        return view('messaging.email', compact('members'));
    }
    public function indexSMS(){

      $user = \Auth::user();
      $members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->branchcode)->get();
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

      //$sql = "SELECT (u.branchname) AS name, (u.branchcode) AS code, m.msg_from, m.msg_to, m.msg, m.date
      //FROM messaging m, users u WHERE $user->branchcode = msg_to GROUP BY name,code,m.msg_from, m.msg_to, m.msg, m.date";

      /*$sql = "SELECT m.*, (u.branchname) AS name, (u.branchcode) AS code FROM messaging m LEFT JOIN users u ON m.msg_from = u.branchcode
      WHERE m.date IN
      (SELECT MAX(date) FROM messaging WHERE msg_to = $user OR msg_from = $user GROUP BY msg_from)";
      $msg = \DB::select($sql);*/

      //$sql = "SELECT * FROM users";
      //$users= \DB::select($sql);

      /*$sql = "SELECT COUNT(m.id) as count, (u.branchname) AS name, (u.branchcode) AS code FROM messaging m LEFT JOIN users u ON m.msg_from = u.branchcode
      WHERE (m.id > 0) AND (msg_to = $users->branchcode AND msg_from != $users->branchcode) GROUP BY name, code";
      $msg_user = \DB::select($sql);*/
      $msg_user = \App\User::selectRaw('count(messagings.id) as count, users.branchname, users.branchcode')->
      leftjoin('messagings', 'messagings.msg_from', '=', 'users.branchcode')->where('messagings.id', '>', '0')->
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

      /*$sql = "SELECT  *
      FROM    messaging a
      WHERE   (a.msg_from = $from AND a.msg_to = $from) OR
              (a.msg_from = $to AND a.msg_to = $to)
      ORDER   BY date DESC";*/
      /*$sql = "SELECT a.id, a.msg_to, a.msg_from, a.date, a.msg
      FROM  messaging a
      INNER JOIN (
          SELECT MAX(id) AS id
          FROM  messaging AS  alt
          WHERE  alt.msg_to =$to
          OR  alt.msg_from =$from
          GROUP BY  least(msg_to, msg_from), greatest(msg_to, msg_from)
      )b ON a.id = b.id";

      $sql = "SELECT m.msg_from, m.msg_to, m.date, m.seen, f.branchname as from_name, t.branchname as to_name
      FROM messaging m
      JOIN users t ON m.msg_to = $to INNER JOIN users f ON m.msg_from = $from
      WHERE m.msg_to = $to AND m.msg_from = $from OR m.msg_from = $to AND m.msg_to =$from GROUP BY m.msg_from, m.msg_to, m.date, m.seen, from_name, to_name";
      $chat = \DB::select($sql);*/

      //$sql = "SELECT * FROM messagings WHERE msg_to = $to AND msg_from = $from OR msg_from = $to AND msg_to =$from";
      //$chat = \DB::select($sql);
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
}
