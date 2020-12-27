<?php

namespace Andalusia\Notification\Listeners;

class NotificationEventSubscriber
{
    /**
     * Handle a liked post.
     */
    public function handleLikedPost($event)
    {
        \Andalusia\Notification\Models\Notification::create([
            'user_id' => $event->user->id,
            'link'    => $event->link,
            'message' => $event->message
        ]);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Andalusia\Notification\Events\PostLiked',
            'Andalusia\Notification\Listeners\NotificationEventSubscriber@handleLikedPost'
        );
    }
}