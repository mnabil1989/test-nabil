<?php

namespace Andalusia\Notification\Events;

use Andalusia\Notification\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostLiked implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the user.
     *
     * @var \App\User
     */
    public $user;

    /**
     * the link.
     *
     * @var string
     */
    public $link;

    /**
     * the message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(\App\User $user, $link, $message)
    {
        $this->user    = $user;
        $this->link    = $link;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['post-liked'];
    }
}
