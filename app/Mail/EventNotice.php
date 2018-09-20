<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\PendingMail;

class EventNotice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $request;
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->from('noreply@cms.hoffenheimtechnologies.tech')
                     ->subject($this->request->subject)
                     ->view('mails.eventnotice');
     }
}
