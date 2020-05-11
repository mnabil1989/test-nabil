<?php

namespace App\Listeners;

use App\Events\PaymentFailedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentFailedListener
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
     * @param  PaymentFailedEvent  $event
     * @return void
     */
    public function handle(PaymentFailedEvent $event)
    {
        $details = [
            'email' => [
                'subject' => 'DotCare لقد فشل الدفع في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare لقد فشل الدفع في خدمة أندلسية',
                'content' => $event->payment->replace_attributes('notification.payment_failed'),
                'to'      => $event->payment->appointment->userId->email,
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ],
            'sms' => [
                'mobile' => $event->payment->appointment->userId->phone,
                'text'   => $event->payment->replace_attributes('sms.payment_failed')
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details));
    }
}
