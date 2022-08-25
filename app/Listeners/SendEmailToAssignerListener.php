<?php

namespace App\Listeners;

use App\Models\Task;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailToAssignerNotification;

class SendEmailToAssignerListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->task->status_id == Task::COMPLETED) {
            $assigner = $event->task->createdBy;
            Notification::send($assigner, new SendEmailToAssignerNotification($event->task));
        }
    }
}
