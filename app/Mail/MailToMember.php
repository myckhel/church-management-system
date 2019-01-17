<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use \App\User;

class MailToMember extends Mailable
{
    use Queueable, SerializesModels;
    public $message, $subject, $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        //
        $this->message = $request->message;
        $this->subject = $request->subject;
        $this->email = $user->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@cms.hoffenheimtechnologies.tech')
                    ->subject($this->subject)
                    ->with([
                        'message' => $this->message,
                        // 'subject' => $this->$subject,
                      ])
                    ->markdown('mails.email-to-member');
    }
}
