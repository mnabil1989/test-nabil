<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * the details
     *
     * @var array
     */
    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(@$this->details['email'])
        {
            $email_details = $this->details['email'];
            $email         = new \App\Mail\NotificationEmail($email_details);

            \Mail::to($email_details['to'])
                ->bcc($email_details['bcc'])
                ->send($email);
        }

        if(@$this->details['sms'])
        {
            $sms_details = $this->details['sms'];
            $mobiles     = @$this->details['is_user'] ? '' : setting('sms.coordinator_phones');
            \App\SMS\Send::send_msg($sms_details['mobile'], $sms_details['text'], $mobiles);
        }
    }
}
