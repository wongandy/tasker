<?php

namespace App\Providers;

use App\Events\CompletedTaskEvent;
use App\Events\RegisteredUserEvent;
use App\Listeners\SendEmailToAllAdminListener;
use App\Listeners\SendEmailToAssignerListener;
use App\Listeners\SendWelcomeEmailToUserListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RegisteredUserEvent::class => [
            SendWelcomeEmailToUserListener::class,
            SendEmailToAllAdminListener::class
        ],
        CompletedTaskEvent::class => [
            SendEmailToAssignerListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
