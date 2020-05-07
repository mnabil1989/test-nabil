<?php

namespace App\SMS;

class Send
{
    /**
     * the user
     *
     * @var string
     */
    private static $user;

    /**
     * the password
     *
     * @var string
     */
    private static $pwd;

    /**
     * the sender id
     *
     * @var string
     */
    private static $sender_id;

    /**
     * the mobile number
     *
     * @var string
     */
    private static $mobile;

    /**
     * send the message.
     *
     * @param string $mobile
     * @param string $msg_text
     * @param string $mobiles
     * @return string
     */
    public static function send_msg($mobile, $msg_text, $mobiles = '')
    {
        static::set_values($mobile, $mobiles);
        $user           = static::$user;
        $pwd            = static::$pwd;
        $sender_id      = static::$sender_id;
        $mobile         = static::$mobile;
        $msg_text       = urlencode($msg_text);
        $url            = "http://mshastra.com/sendurlcomma.aspx?user={$user}&pwd={$pwd}&senderid={$sender_id}&mobileno={$mobile}&msgtext={$msg_text}&CountryCode=ALL&language=Unicode";
        $ch             = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        curl_close($ch);
        return $curl_scraped_page;
    }

    /**
     * set the configuration variables.
     *
     * @var string $mobile
     * @var string $mobiles
     * @return void
     */
    private static function set_values($mobile, $mobiles)
    {
        static::$user      = config('sms.user');
        static::$pwd       = config('sms.pwd');
        static::$sender_id = config('sms.sender_id');
        $mobiles           = $mobiles != '' ? ','.$mobiles : '';
        static::$mobile    = config('sms.mobile').$mobile.$mobiles;
    }
}
