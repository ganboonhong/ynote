<?php

namespace App\Handlers\Events;

use App\Events;
use App\User;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginEventHandler
{
    /**
     * Create the event handler.
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
     * @param  User $user
     * @return void
     */
    public function handle(User $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }
}
