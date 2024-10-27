<?php

namespace App\Services\Interfaces;

interface Sms
{
    public function send(string $mobile, string $message);
}
