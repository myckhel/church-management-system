<?php

namespace App\Listeners;

use App\Events\MyckhelPaystackEventsHook;
use Illuminate\Support\Facades\Log;

class PaystackWebHookListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MyckhelPaystackEventsHook  $event
     * @return void
     */
    public function handle(MyckhelPaystackEventsHook $event)
    {
        //
        Log::debug($event->event);
    }
}
