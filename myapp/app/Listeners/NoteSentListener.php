<?php

namespace App\Listeners;

use App\Events\NoteSentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NoteSentListener
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
     * @param  NoteSentEvent  $event
     * @return void
     */
    public function handle(NoteSentEvent $event)
    {
        $details = [
            'email' => [
                'subject' => 'DotCare الوصفة الطبية في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare الوصفة الطبية في خدمة أندلسية',
                'content' => $event->note->replace_attributes('notification.note_sent'),
                'to'      => $event->note->userId->email,
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details));
    }
}
