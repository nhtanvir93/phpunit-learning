<?php

namespace App\Models;

use App\Abstracts\Animal;

class Cat extends Animal
{
    public function __construct()
    {
        parent::__construct('Cat');
    }

    public function makeSound(): string
    {
        return "Meaw Meaw";
    }
}
