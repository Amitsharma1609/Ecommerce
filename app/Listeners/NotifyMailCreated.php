<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\UserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class NotifyMailCreated implements ShouldQueue
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
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {

            Mail::to('hello@gmail.com')->send(new UserMail($event));
    }
}
