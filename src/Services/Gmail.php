<?php

namespace App\Services;

use App\Services\Interfaces\Mail;

class EmptyEmailException extends \Exception {}

class Gmail implements Mail
{
    private static $gmail;

    private function __construct() {}

    public static function getInstance()
    {
        if (!self::$gmail)
            self::$gmail = new Gmail();

        return self::$gmail;
    }

    public function send(string $email, string $message)
    {
        if (empty($email))
            throw new EmptyEmailException;

        echo "Email : $email, Message : $message \n";
        return true;
    }
}
