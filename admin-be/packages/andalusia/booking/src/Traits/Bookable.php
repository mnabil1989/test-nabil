<?php

namespace Andalusia\Booking\Traits;

use Andalusia\Booking\Models\Appointment;
use Andalusia\Booking\Models\BookingPhone;

Trait Bookable
{
    /**
     * the response.
     *
     * @array
     */
    private static $response = [
        'message' => '',
        'errors'  => []
    ];

    /**
     * book for the user/guest.
     *
     * @return object
     */
    public static function book(array $data)
    {
        if(auth('api')->user())
            return self::auth_book($data);
        else
            return self::guest_book($data);
    }

    /**
     * book for the authenticated user.
     *
     * @return object
     */
    public static function auth_book(array $data)
    {
        $check_date = static::check_date($data);
        if(count($check_date['errors']) > 0)
            return $check_date;

        $booking = self::create($data);
        if(@$data['phones'])
        {
            foreach ($data['phones'] as $phone)
            {
                if($phone['number'] != auth('api')->user()->phone)
                {
                    BookingPhone::create([
                        'booking_id' => $booking->id,
                        'phone'      => $phone['number']
                    ]);
                }
            }
            return $booking;
        }
        return $booking;
    }

    /**
     * book for the guest user.
     *
     * @return object
     */
    public static function guest_book(array $data)
    {
        $check_date = static::check_date($data);
        if(count($check_date['errors']) > 0)
            return $check_date;

        $check_phones_existence = static::check_phones_existence(@$data['phones']);
        if(count($check_phones_existence['errors']) > 0)
            return $check_phones_existence;

        $booking = self::create($data);
        foreach ($data['phones'] as $phone)
        {
            BookingPhone::create([
                'booking_id' => $booking->id,
                'phone'      => $phone['number']
            ]);
        }
        return $booking;
    }

    /**
     * validate the date.
     *
     * @return array
     */
    public static function check_date(array $data)
    {
        $sent_day        = \Carbon\Carbon::parse($data['date'])->format('l');
        $appointment_day = (Appointment::find($data['appointment_id']))->day;
        $is_valid        = $sent_day == $appointment_day ? true : false;

        if(!$is_valid)
        {
            self::$response['message']        = 'The given data was invalid.';
            self::$response['errors']['date'] = [];
            array_push(
                self::$response['errors']['date'],
                'please make sure that the day in the sent date is the same as the appointment day'
            );
        }

        return self::$response;
    }

    /**
     * check if phones exist (this is necessary for the guest user).
     *
     * @return array
     */
    public static function check_phones_existence($phones)
    {
        if(!$phones)
        {
            self::$response['message']          = 'please send the phones array';
            self::$response['errors']['phones'] = [];
            array_push(
                self::$response['errors']['phones'],
                'Phones are required when the user isn\'t authenticated.'
            );
        }

        return self::$response;
    }
}
