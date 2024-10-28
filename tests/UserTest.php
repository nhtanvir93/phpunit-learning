<?php

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function testEmptyPrivateFirstName()
    {
        $user = new User('', '');

        $reflection = new ReflectionClass(User::class);

        $property = $reflection->getProperty('firstName');
        $property->setAccessible(true);

        $this->assertEmpty($property->getValue($user));
    }

    public function testFilledPrivateFirstName()
    {
        $user = new User('Mohammed', 'Tanvir');

        $reflection = new ReflectionClass(User::class);

        $property = $reflection->getProperty('firstName');
        $property->setAccessible(true);

        $this->assertEquals('Mohammed', $property->getValue($user));
    }

    public function testEmptyPrivateLastName()
    {
        $user = new User('', '');

        $reflection = new ReflectionClass(User::class);

        $property = $reflection->getProperty('lastName');
        $property->setAccessible(true);

        $this->assertEmpty($property->getValue($user));
    }

    public function testFilledPrivateLastName()
    {
        $user = new User('Mohammed', 'Tanvir');

        $reflection = new ReflectionClass(User::class);

        $property = $reflection->getProperty('lastName');
        $property->setAccessible(true);

        $this->assertEquals('Tanvir', $property->getValue($user));
    }

    public function testModifiedFirstNameValidity()
    {
        $user = new User('Mohammed', 'Tanvir');

        $reflection = new ReflectionClass(User::class);

        $method = $reflection->getMethod('setFirstName');
        $method->setAccessible(true);

        $method->invokeArgs($user, ['Md.']);

        $property = $reflection->getProperty('firstName');
        $property->setAccessible(true);

        $this->assertEquals('Md.', $property->getValue($user));
    }
}
