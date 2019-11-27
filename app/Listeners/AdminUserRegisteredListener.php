<?php

namespace App\Listeners;

use App\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminUserRegisteredListener implements ShouldQueue
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
        $user = $event->user;
        $url = route('admin.users.show', $user->id);
        $content = $user->username . ' just registered!';

        Notification::create([
            'url' => $url,
            'content' => $content,
        ]);
    }
}
