<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class MailMember extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The request instance.
     *
     * @var Request
     */
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->from('church@churchCMS.com')
                    ->subject($this->request->subject)
                    ->view('mails.member');
    }
}
