<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Queue;
use App\Classes\QueueException;

class QueueTest extends TestCase
{
    private $queue;

    public function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function testEmptyQueueSize()
    {
        $this->assertEquals(0, $this->queue->count());
    }

    public function testCorrectQueueSizeAfterAddingSingleItem()
    {
        $this->queue->push('Green');

        $this->assertEquals(1, $this->queue->count());
    }

    public function testCorrectQueueSizeAfterAddingMultipleItems()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');

        $this->assertEquals(3, $this->queue->count());
    }

    public function testQueueExceptionWhileCrossingMaxLimit()
    {
        $this->expectException(QueueException::class);

        for ($i = 0; $i < 6; $i++)
            $this->queue->push($i);
    }

    public function testCorrectPoppedItem()
    {
        $this->queue->push('Green');

        $this->assertEquals('Green', $this->queue->pop());
    }

    public function testCorrectPoppedItems()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');

        $this->assertEquals('Green', $this->queue->pop());
        $this->assertEquals('Red', $this->queue->pop());
        $this->assertEquals('Blue', $this->queue->pop());
    }

    public function testCorrectQueueSizeAfterClear()
    {
        $this->queue->push('Green');
        $this->queue->push('Red');
        $this->queue->push('Blue');

        $this->queue->clear();

        $this->assertEquals(0, $this->queue->count());
    }
}
