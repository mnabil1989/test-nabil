<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\AppointmentTransit;

class PaymentPendingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * the payment.
     *
     * @var AppointmentTransit
     */
    public $payment;

    /**
     * Create a new event instance.
     *
     * @param AppointmentTransit $payment
     * @return void
     */
    public function __construct(AppointmentTransit $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('payment-failed');
    }
}
