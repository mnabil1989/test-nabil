<?php

namespace App\Observers;

use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if($user->doctor_id == 0)
        {
            $details = [
                'is_user' => true, //flag
                'email' => [
                    'subject' => 'DotCare مرحباً بك في خدمة أندلسية',
                    'blade'   => 'customized_notification',
                    'title'   => 'DotCare مرحباً بك في خدمة أندلسية',
                    'content' => $user->replace_attributes('notification.user_new'),
                    'to'      => $user->email,
                    'bcc'     => explode(',',setting('notification.coordinator_emails')),
                ],
                'sms' => [
                    'mobile' => $user->phone,
                    'text'   => $user->replace_attributes('sms.user_new')
                ]
            ];

            dispatch(new \App\Jobs\SendNotificationJob($details));
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
