<?php

namespace App\Listeners;

use App\Events\RegisteredUserEvent;
use App\Notifications\SendWelcomeEmailToUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmailToUserListener implements ShouldQueue
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
     * @param  \App\Events\RegisteredUserEvent  $event
     * @return void
     */
    public function handle(RegisteredUserEvent $event)
    {
        $event->user->notify(new SendWelcomeEmailToUserNotification($event->user));
    }
}
