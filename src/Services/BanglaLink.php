<?php

namespace App\Services;

use App\Services\Interfaces\Sms;

class EmptyMobileException extends \Exception {}

class BanglaLink implements Sms
{
    private static $banglaLink;

    private function __construct() {}

    public static function getInstance(): BanglaLink
    {
        if (!self::$banglaLink)
            self::$banglaLink = new Banglalink();

        return self::$banglaLink;
    }

    public function send(string $mobile, string $message)
    {
        if (empty($mobile))
            throw new EmptyMobileException;

        echo "Mobile : $mobile, Message : $message \n";
        return true;
    }
}
