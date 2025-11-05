<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use \Illuminate\Support\Str;

class SaveLoginInfo
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
    public function handle(Login $event): void
    {
        /** @var \App\Models\User $user */
        $user = $event->user;

        $user->last_login_ip = request()->ip();
        $user->last_login_at = now();

        if (!$user->uuid) {
            $user->uuid = Str::uuid();
        }

        $user->save();

        Log::info("Usuario {$user->id} inició sesión desde " . request()->ip());
    }
}
