<?php

namespace App\Listeners;

use App\Events\newCustomerRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyViaSlack
{
  
    /**
     * Handle the event.
     *
     * @param  newCustomerRegisterEvent  $event
     * @return void
     */
    public function handle(newCustomerRegisterEvent $event)
    {
        //dump("Slack Notification");
    }
}
