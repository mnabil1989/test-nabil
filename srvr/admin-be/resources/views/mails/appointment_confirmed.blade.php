<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmed</title>
</head>
<body>
@php
    $mail=str_replace('[[user_name]]',$d['user_name'],setting('notification.confirmed'));
    $mail=str_replace('[[user_email]]',$d['email'],$mail);
    $mail=str_replace('[[doctor_name]]',$d['doctor_name'],$mail);
    $mail=str_replace('[[doctor_email]]',$d['doctor_email'],$mail);
    $mail=str_replace('[[Appointment_start]]',$d['Appointment_start'],$mail);
    $mail=str_replace('[[Appointment_duration]]',$d['Appointment_duration'],$mail);
@endphp
{!!$mail!!}
</body>
</html>

