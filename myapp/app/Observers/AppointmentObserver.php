<?php

namespace App\Observers;

use App\Appointment;
use Carbon\Carbon;

class AppointmentObserver
{
    /**
     * Handle the appointment "created" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function created(Appointment $appointment)
    {
        cache()->put("appointment-{$appointment->id}", $appointment);

        $details = [
            'email' => [
                'subject' => 'DotCare موعدك في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare موعدك في خدمة أندلسية',
                'content' => $appointment->replace_attributes('notification.new'),
                'to'      => $appointment->userId->email,
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ],
            'sms' => [
                'mobile' => $appointment->userId->phone,
                'text'   => $appointment->replace_attributes('sms.new')
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details));

        // reminder email + sms
        $details['email']['content'] = $appointment->replace_attributes('notification.reminder');
        $details['sms']['text']      = $appointment->replace_attributes('sms.reminder');

        $job_id = app(\Illuminate\Contracts\Bus\Dispatcher::class)->dispatch(
                      (new \App\Jobs\SendNotificationJob($details))
                          ->delay(Carbon::parse($appointment->start)->subMinutes(15))
                  );
        cache()->put("appointment-{$appointment->id}-reminder_job_id", $job_id);
    }

    /**
     * Handle the appointment "updated" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function updated(Appointment $appointment)
    {
        $old_appointment = cache()->get("appointment-{$appointment->id}");
        cache()->put("appointment-{$appointment->id}", $appointment);

        $details = [
            'email' => [
                'subject' => 'DotCare موعدك في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare موعدك في خدمة أندلسية',
                'content' => $appointment->replace_attributes('notification.confirmed'),
                'to'      => explode(',',"{$appointment->userId->email},{$appointment->doctorId->email}"),
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ],
            'sms' => [
                'mobile' => $appointment->userId->phone,
                'text'   => $appointment->replace_attributes('sms.confirmed')
            ]
        ];

        if($old_appointment->start != $appointment->start)
        {
            $details['email']['subject'] = 'DotCare موعدك في خدمة أندلسية';
            $details['email']['title']   = 'DotCare موعدك في خدمة أندلسية';
            $details['email']['content'] = $appointment->replace_attributes('notification.change');
            $details['sms']['text']      = $appointment->replace_attributes('sms.change');
            dispatch(new \App\Jobs\SendNotificationJob($details));

            // reminder email + sms
            $details['email']['content'] = $appointment->replace_attributes('notification.reminder');
            $details['sms']['text']      = $appointment->replace_attributes('sms.reminder');

            \App\Job::destroy(cache()->get("appointment-{$appointment->id}-reminder_job_id"));
            $job_id = app(\Illuminate\Contracts\Bus\Dispatcher::class)->dispatch(
                        (new \App\Jobs\SendNotificationJob($details))
                            ->delay(Carbon::parse($appointment->start)->subMinutes(15))
                      );
            cache()->put("appointment-{$appointment->id}-reminder_job_id", $job_id);
        }

        if($old_appointment->confirmed != $appointment->confirmed)
        {
            if($appointment->confirmed == 0)
            {
                $details['email']['subject'] = 'DotCare موعدك في خدمة أندلسية';
                $details['email']['title']   = 'DotCare موعدك في خدمة أندلسية';
                $details['email']['content'] = $appointment->replace_attributes('notification.rejected');
                $details['sms']['text']      = $appointment->replace_attributes('sms.rejected');
            }

            dispatch(new \App\Jobs\SendNotificationJob($details));
        }

        if($old_appointment->payment_confirmed != $appointment->payment_confirmed)
        {
            if($appointment->payment_confirmed == 1)
            {
                $details['email']['subject'] = 'DotCare موعدك في خدمة أندلسية';
                $details['email']['title']   = 'DotCare موعدك في خدمة أندلسية';
                $details['email']['content'] = $appointment->replace_attributes('notification.payment');
                $details['email']['to']      = $appointment->userId->email;
                $details['sms']['text']      = $appointment->replace_attributes('sms.payment');
            }
            dispatch(new \App\Jobs\SendNotificationJob($details));
        }
    }

    /**
     * Handle the appointment "deleted" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function deleted(Appointment $appointment)
    {
        $details = [
            'email' => [
                'subject' => 'DotCare موعدك في خدمة أندلسية',
                'blade'   => 'customized_notification',
                'title'   => 'DotCare موعدك في خدمة أندلسية',
                'content' => $appointment->replace_attributes('notification.rejected'),
                'to'      => explode(',',"{$appointment->userId->email},{$appointment->doctorId->email}"),
                'bcc'     => explode(',',setting('notification.coordinator_emails')),
            ],
            'sms' => [
                'mobile' => $appointment->userId->phone,
                'text'   => $appointment->replace_attributes('sms.rejected')
            ]
        ];

        dispatch(new \App\Jobs\SendNotificationJob($details));
        cache()->forget("appointment-{$appointment->id}");
        cache()->forget(cache()->get("appointment-{$appointment->id}-reminder_job_id"));
    }

    /**
     * Handle the appointment "restored" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function restored(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the appointment "force deleted" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function forceDeleted(Appointment $appointment)
    {
        //
    }
}
