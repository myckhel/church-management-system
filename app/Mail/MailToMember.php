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
    public $message, $subject, $email, $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, User $user)
    {
        //
        $dom = new \domdocument();
        $dom->loadHtml($request->message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $dom->savehtml();
        $this->message = $dom;//$request->message;
        $this->subject = $request->subject;
        $this->email = $user->email;
        $this->name = $user->branchname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mailer@cms.hoffenheimtechnologies.tech', ucwords($this->name))
                    ->subject($this->subject)
                    ->with([
                        'message' => $this->message,
                        // 'subject' => $this->$subject,
                      ])
                      ->replyTo($this->email)
                    ->markdown('mails.email-to-member');
    }
}
