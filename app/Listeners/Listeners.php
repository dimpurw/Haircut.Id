<?php

namespace App\Listeners;

use App\Events\ForgotActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Listeners
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
     * @param  ForgotActivationEmail  $event
     * @return void
     */
    public function handle(ForgotActivationEmail $event)
    {
        //
    }
}
