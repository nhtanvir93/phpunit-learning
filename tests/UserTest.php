<?php

use App\Classes\Mailer;
use PHPUnit\Framework\TestCase;
use App\Classes\User;

class UserTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        // $mailerMock = $this->createMock(Mailer::class);

        // $mailerMock
        //     ->expects($this->once())
        //     ->method('send')
        //     ->willReturn(true);

        $mailerMock = $this->getMockBuilder(Mailer::class)
            ->onlyMethods([])
            ->getMock();

        $this->user = new User($mailerMock);
    }

    // public function testFullNameForNonEmptyInputs()
    // {
    //     $this->user->setFirstName('Nusaiba');
    //     $this->user->setLastName('Noor');

    //     $this->assertEquals('Nusaiba Noor', $this->user->getFullName());
    // }

    // public function testEmptyFullName()
    // {
    //     $this->assertEquals('', $this->user->getFullName());
    // }

    // public function testFullNameForFirstName()
    // {
    //     $this->user->setFirstName('Nusaiba');

    //     $this->assertEquals('Nusaiba', $this->user->getFullName());
    // }

    // public function testFullNameForLastName()
    // {
    //     $this->user->setLastName('Noor');

    //     $this->assertEquals('Noor', $this->user->getFullName());
    // }

    // public function testSendEmailToCurrentUser()
    // {
    //     $this->user->setEmail('nnoor@gmail.com');

    //     $this->assertEquals(true, $this->user->sendMessage('Hello'));
    // }

    public function testCatchExceptionWhenEmailIsEmpty()
    {
        $this->expectException(Exception::class);

        $this->user->setEmail('');
        $this->user->sendMessage('Hello');
    }
}
