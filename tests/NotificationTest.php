<?php

use PHPUnit\Framework\TestCase;
use App\Services\BanglaLink;
use App\Services\EmptyMobileException;
use App\Services\Gmail;
use App\Services\EmptyEmailException;

class NotificationTest extends TestCase
{
    public function testEmptyMobileExceptionWhenMobileIsEmpty()
    {
        $banglaLink = BanglaLink::getInstance();

        $this->expectException(EmptyMobileException::class);
        $banglaLink->send('', 'Please come to office as soon as possible and it is urgent.');
    }

    public function testSmsProcessWhenMobileIsValid()
    {
        $banglaLink = BanglaLink::getInstance();

        $this->assertTrue($banglaLink->send('8801968569447', 'Please come to office as soon as possible and it is urgent.'));
    }

    public function testEmptyEmailExceptionWhenEmailIsEmpty()
    {
        $gmail = Gmail::getInstance();

        $this->expectException(EmptyEmailException::class);
        $gmail->send('', 'Please come to office as soon as possible and it is urgent.');
    }

    public function testMailProcessWhenEmailIsValid()
    {
        $gmail = Gmail::getInstance();

        $this->assertTrue($gmail->send('tanvir.eatl@gmail.com', 'Please come to office as soon as possible and it is urgent.'));
    }
}
