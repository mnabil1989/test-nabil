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

class NotificationPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the id.
     *
     * @var int
     */
    public $id;

    /**
     * the image.
     *
     * @var string
     */
    public $image;

    /**
     * the thumbnail.
     *
     * @var string
     */
    public $thumbnail;

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
     * the type.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $image, $thumbnail, $link, $message, $type)
    {
        $this->id        = $id;
        $this->image     = $image;
        $this->thumbnail = $thumbnail;
        $this->link      = $link;
        $this->message   = $message;
        $this->type      = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification-posted');
    }
}
