<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserRegisteredNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $admin = User::where('role', User::ROLE_ADMIN)->first();

        if ($admin) {
            $admin -> notify(new UserRegistered($event -> user));
        }
    }
}
