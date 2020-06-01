<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\AppointmentNote;

class NoteSentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the note.
     *
     * @var AppointmentNote
     */
    public $note;

    /**
     * Create a new event instance.
     *
     * @param AppointmentNote $note
     * @return void
     */
    public function __construct(AppointmentNote $note)
    {
        $this->note = $note;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('note-sent');
    }
}
