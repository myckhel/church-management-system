<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;
use DateInterval;

class RecoverPasswordController extends Controller
{
    //
    public function index(){
    	return view('auth.passwords.recover');
    }
    public function recover(Request $request){
        $email = $request->input('email');
        // Create tokens
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = sprintf('%s',  route('recover.reset',['selector'=>$selector, 'validator'=>bin2hex($token)]));

        // Token expiration
        $expires = new DateTime('NOW');
        $expires->add(new DateInterval('PT01H')); // 1 hour

        // Delete any existing tokens for this user
        DB::delete('delete * from password_reset where email =?', $email);

        // Insert reset token into database
        $insert = $this->db->insert('password_reset',
            array(
                'email'     =>  $email,
                'selector'  =>  $selector,
                'token'     =>  hash('sha256', $token),
                'expires'   =>  $expires->format('U'),
            )
        );

        // Send the email
        // Recipient
        $to = $user->email;

        // Subject
        $subject = 'Your password reset link';

        // Message
        $message = '<p>We recieved a password reset request. The link to reset your password is below. ';
        $message .= 'If you did not make this request, you can ignore this email</p>';
        $message .= '<p>Here is your password reset link:</br>';
        $message .= sprintf('<a href="%s">%s</a></p>', $url, $url);
        $message .= '<p>Thanks!</p>';

        // Headers
        $headers = "From: " . ADMIN_NAME . " <" . ADMIN_EMAIL . ">\r\n";
        $headers .= "Reply-To: " . ADMIN_EMAIL . "\r\n";
        $headers .= "Content-type: text/html\r\n";

        // Send email
        $sent = mail($to, $subject, $message, $headers);



    	return view('auth.passwords.recover', ['message'=>$message]);
    }

    public function reset(Request $request){

    }
}
?>
