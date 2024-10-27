<?php

namespace App\Classes;

class Mailer
{
    public function send(string $email, string $message)
    {
        if (empty($email))
            throw new \Exception('Email is empty');

        sleep(3);

        echo "Receiver : $email, Message : $message \n";
        return true;
    }
}
