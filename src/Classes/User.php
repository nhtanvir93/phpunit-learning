<?php

namespace App\Classes;

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function sendMessage(string $message)
    {
        return $this->mailer->send($this->email, $message);
    }
}
