<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\ConsultationModel;

class NewConsulationBroadCast extends Event
{
    use SerializesModels;

    public $consultation;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ConsultationModel $consultation)
    {
        $this->consultation = $consultation;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
