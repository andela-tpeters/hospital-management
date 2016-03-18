<?php

namespace App\Listeners;

use App\Events\NewConsultationBroadCast;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class NewConsultationListener
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
     * @param  NewConsultationBroadCast  $event
     * @return void
     */
    public function handle(NewConsultationBroadCast $event)
    {
        // return "This is me";
        Request::session()->flash('report','Consultation Successful');
        // return redirect('/patients/');
    }
}
