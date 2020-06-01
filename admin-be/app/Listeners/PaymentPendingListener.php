<?php

namespace App\Listeners;

use App\Events\PaymentPendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentPendingListener
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
     * @param  PaymentPendingEvent  $event
     * @return void
     */
    public function handle(PaymentPendingEvent $event)
    {
        $details = [
            'email' => [
                'subject' => 'DotCare عملية الدفع قيد الانتظار في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare عملية الدفع قيد الانتظار في خدمة أندلسية',
                'content' => $event->payment->replace_attributes('notification.payment_pending'),
                'to'      => $event->payment->appointment->userId->email,
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ],
            'sms' => [
                'mobile' => $event->payment->appointment->userId->phone,
                'text'   => $event->payment->replace_attributes('sms.payment_pending')
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details));
    }
}
