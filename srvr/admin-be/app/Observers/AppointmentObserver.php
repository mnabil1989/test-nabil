<?php

namespace App\Observers;

use App\Appointment;

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
        $details['email']   = $appointment->userId->email;
        $details['user_name']    = $appointment->userId->name;
        $details['doctor_name']    = $appointment->doctorId->title_en;
        $details['doctor_email']    = $appointment->doctorId->email;
        $details['doctor_photo']    = url($appointment->doctorId->photo);
        $details['Appointment_start']=$appointment->start;
        $details['Appointment_duration']=$appointment->duration;
        $details['bcc'] = explode(',',env('COORDINATOR_EMAILS'));
        $details['blade']   = 'appointment_new';
        $details['subject'] = 'New Appointment';
        dispatch(new \App\Jobs\SendEmailJob($details));
        //     ----------------------------SMS----------------------------------
        $user      = env('MSHASTRA_USER');
        $pwd       = env('MSHASTRA_PWD');
        $sender_id = env('MSHASTRA_SENDER_ID');
        $mobile    = '9665'.$appointment->userId->phone;

        $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.new'));
        $msg_text  = str_replace('[[user_email]]',$details['email'],$msg_text);
        $msg_text  = str_replace('[[doctor_name]]',$details['doctor_name'],$msg_text);
        $msg_text  = str_replace('[[doctor_email]]',$details['doctor_email'],$msg_text);
        $msg_text  = str_replace('[[Appointment_start]]',$details['Appointment_start'],$msg_text);
        $msg_text  = str_replace('[[Appointment_duration]]',$details['Appointment_duration'],$msg_text);
        $msg_text  = urlencode($msg_text);

        $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
        $ch        = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Handle the appointment "updated" event.
     *
     * @param  \App\Appointment  $appointment
     * @return void
     */
    public function updated(Appointment $appointment)
    {
        $details['email']   = $appointment->userId->email;
        $details['user_name']    = $appointment->userId->name;
        $details['doctor_name']    = $appointment->doctorId->title_en;
        $details['doctor_email']    = $appointment->doctorId->email;
        $details['doctor_photo']    = url($appointment->doctorId->photo);
        $details['Appointment_start']=$appointment->start;
        $details['Appointment_duration']=$appointment->duration;
        $details['bcc'] = explode(',',env('COORDINATOR_EMAILS'));
        $details['blade']   = 'appointment_confirmed';
        $details['subject'] = 'Confirmed';

        if($appointment->confirmed == 1){
            // send to the user
            dispatch(new \App\Jobs\SendEmailJob($details));
            // send to the doctor
            $details['email'] = $appointment->doctorId->email;
//            $details['bcc']   = [];
            dispatch(new \App\Jobs\SendEmailJob($details));
            //     ----------------------------SMS----------------------------------
            $user      = env('MSHASTRA_USER');
            $pwd       = env('MSHASTRA_PWD');
            $sender_id = env('MSHASTRA_SENDER_ID');
            $mobile    = '9665'.$appointment->userId->phone;

            $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.confirmed'));
            $msg_text  = str_replace('[[user_email]]',$details['email'],$msg_text);
            $msg_text  = str_replace('[[doctor_name]]',$details['doctor_name'],$msg_text);
            $msg_text  = str_replace('[[doctor_email]]',$details['doctor_email'],$msg_text);
            $msg_text  = str_replace('[[Appointment_start]]',$details['Appointment_start'],$msg_text);
            $msg_text  = str_replace('[[Appointment_duration]]',$details['Appointment_duration'],$msg_text);
            $msg_text  = urlencode($msg_text);

            $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
            $ch        = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
        }
        else
        {
            $details['email']   = explode(',',"{$appointment->userId->email},{$appointment->doctorId->email}");
            $details['user_name']    = $appointment->userId->name;
            $details['user_email']    = $appointment->userId->email;
            $details['doctor_name']    = $appointment->doctorId->title_en;
            $details['doctor_email']    = $appointment->doctorId->email;
            $details['doctor_photo']    = url($appointment->doctorId->photo);
            $details['Appointment_start']=$appointment->start;
            $details['Appointment_duration']=$appointment->duration;
            $details['bcc'] = explode(',',env('COORDINATOR_EMAILS'));
            $details['blade']   = 'appointment_rejected';
            $details['subject'] = 'Rejected';
            // send to the user and the doctor as well
            dispatch(new \App\Jobs\SendEmailJob($details));
            //     ----------------------------SMS----------------------------------
            $user      = env('MSHASTRA_USER');
            $pwd       = env('MSHASTRA_PWD');
            $sender_id = env('MSHASTRA_SENDER_ID');
            $mobile    = '9665'.$appointment->userId->phone;

            $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.rejected'));
//            $msg_text  = str_replace('[[user_email]]',$details['email'],$msg_text);
            $msg_text  = str_replace('[[doctor_name]]',$details['doctor_name'],$msg_text);
            $msg_text  = str_replace('[[doctor_email]]',$details['doctor_email'],$msg_text);
            $msg_text  = str_replace('[[Appointment_start]]',$details['Appointment_start'],$msg_text);
            $msg_text  = str_replace('[[Appointment_duration]]',$details['Appointment_duration'],$msg_text);
            $msg_text  = urlencode($msg_text);

            $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
            $ch        = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
        }
        if($appointment->payment_confirmed == 1)
        {
            $details['user_email']   = $appointment->userId->email;
            $details['user_name']    = $appointment->userId->name;
            $details['doctor_name']    = $appointment->doctorId->title_en;
            $details['email']    = $appointment->userId->email;
            $details['doctor_photo']    = url($appointment->doctorId->photo);
            $details['Appointment_start']=$appointment->start;
            $details['Appointment_duration']=$appointment->duration;
            $details['bcc'] = explode(',',env('COORDINATOR_EMAILS'));
            $details['blade']   = 'appointment_payment_confirmed';
            $details['subject'] = 'Payment Confirmed';
            dispatch(new \App\Jobs\SendEmailJob($details));
            //     ----------------------------SMS----------------------------------
            $user      = env('MSHASTRA_USER');
            $pwd       = env('MSHASTRA_PWD');
            $sender_id = env('MSHASTRA_SENDER_ID');
            $mobile    = '9665'.$appointment->userId->phone;

            $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.payment'));
            $msg_text  = str_replace('[[user_email]]',$details['email'],$msg_text);
            $msg_text  = str_replace('[[doctor_name]]',$details['doctor_name'],$msg_text);
            $msg_text  = str_replace('[[doctor_email]]',$details['doctor_email'],$msg_text);
            $msg_text  = str_replace('[[Appointment_start]]',$details['Appointment_start'],$msg_text);
            $msg_text  = str_replace('[[Appointment_duration]]',$details['Appointment_duration'],$msg_text);
            $msg_text  = urlencode($msg_text);

            $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
            $ch        = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
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
        $details['email']   = $appointment->userId->email;
        $details['user_name']    = $appointment->userId->name;
        $details['doctor_name']    = $appointment->doctorId->title_en;
        $details['doctor_email']    = $appointment->doctorId->email;
        $details['doctor_photo']    = url($appointment->doctorId->photo);
        $details['Appointment_start']=$appointment->start;
        $details['Appointment_duration']=$appointment->duration;
        $details['bcc'] = explode(',',env('COORDINATOR_EMAILS'));
        $details['blade']   = 'appointment_deleted';
        $details['subject'] = 'Deleted Appointment';
        dispatch(new \App\Jobs\SendEmailJob($details));
        //     ----------------------------SMS----------------------------------
        $user      = env('MSHASTRA_USER');
        $pwd       = env('MSHASTRA_PWD');
        $sender_id = env('MSHASTRA_SENDER_ID');
        $mobile    = '9665'.$appointment->userId->phone;

        $msg_text  = str_replace('[[user_name]]',$details['user_name'],setting('sms.deleted'));
        $msg_text  = str_replace('[[user_email]]',$details['email'],$msg_text);
        $msg_text  = str_replace('[[doctor_name]]',$details['doctor_name'],$msg_text);
        $msg_text  = str_replace('[[doctor_email]]',$details['doctor_email'],$msg_text);
        $msg_text  = str_replace('[[Appointment_start]]',$details['Appointment_start'],$msg_text);
        $msg_text  = str_replace('[[Appointment_duration]]',$details['Appointment_duration'],$msg_text);
        $msg_text  = urlencode($msg_text);

        $url       = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
        $ch        = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
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
