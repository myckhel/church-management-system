<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\PendingMail;

class TickectEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $request;
     public function __construct(Request $request)
     {
         $this->request = $request;
     }

    /**
     * Build the message.
     *
     * @return $this
     */

     public function build()
     {
       return $this->from($this->request->email)
                   ->subject($this->request->subject)
                   ->view('email');
     }
    /*public function build()
    {
      return $this->from('sender@example.com')
                    ->view('mails.ticket')
                    ->text('mails.ticket_text')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path('/images').'/profile.png', [
                              'as' => 'profile.png',
                              'mime' => 'image/jpeg',
                      ]);
        //return $this->view('view.name');
    }*/
}
