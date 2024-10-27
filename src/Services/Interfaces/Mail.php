<?php

namespace App\Services\Interfaces;

interface Mail
{
    public function send(string $email, string $message);
}
