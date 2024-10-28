<?php

namespace App\Models;

class User
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function fullName(): string
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    protected function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }
}
