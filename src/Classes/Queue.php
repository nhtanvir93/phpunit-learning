<?php

namespace App\Classes;

final class Queue
{
    public const MAX_SIZE = 5;
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function push($item)
    {
        if ($this->count() === self::MAX_SIZE)
            throw new QueueException('Queue max size exceeded');

        $this->items[] = $item;
    }

    public function pop()
    {
        $popped = array_shift($this->items);

        return $popped;
    }

    public function count()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getItems()
    {
        return $this->items;
    }
}
