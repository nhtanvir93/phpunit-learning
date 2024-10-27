<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Mailer;

class MailerTest extends TestCase
{
    private $mailer;

    public function setUp(): void
    {
        $this->mailer = $this->createMock(Mailer::class);
    }

    public function testSendingEmailStatus()
    {
        $this->mailer->method('send')->willReturn(true);

        $this->assertEquals(true, $this->mailer->send('nusaiba@gmail.com', 'Welcome to our IT Company'));
    }
}
