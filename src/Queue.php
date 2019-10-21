<?php

class Queue
{

    /**
     * Maximum number of item in the queue
     */
    const MAX_ITEMS = 5;

    /**
     * @var array $items
     */
    protected $items = [];

    /**
     * @param string $item
     */
    public function push($item)
    {
        if (static::MAX_ITEMS == $this->getCount()) {
            throw new queueException('Queue is full');
        }
        $this->items[] = $item;
    }

    /**
     * @return mixed array_pop
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * @return int count
     */
    public function getCount()
    {
        return count($this->items);
    }

    /**
     * setup
     */
    public function clear()
    {
        $this->items = [];
    }


}