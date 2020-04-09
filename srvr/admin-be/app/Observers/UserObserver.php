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
            $details['email']     = $user->email;
            $details['user_name'] = $user->name;
            $details['bcc']       = explode(',',env('COORDINATOR_EMAILS'));
            $details['blade']     = 'user_new';
            $details['subject']   = 'New User';
            $details['phone']     = $user->phone;
            dispatch(new \App\Jobs\SendEmailJob($details));
            //     ----------------------------SMS----------------------------------
            $user      = env('MSHASTRA_USER');
            $pwd       = env('MSHASTRA_PWD');
            $sender_id = env('MSHASTRA_SENDER_ID');
            $mobile    = '9665'.$details['phone'];

            $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.user_new'));
            $msg_text  = urlencode($msg_text);

            $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
            $ch        = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
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
