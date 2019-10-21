<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{

    protected static $queue;

    /**
     * Fixture: テスト毎の事前設定、毎回callされる
     */
    protected function setUp(): void
    {
        static::$queue->clear();
    }

    /**
     * テストケースクラスの最初のテストメソッドの実行前にcallされる
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue();
    }

    /**
     * テストケースクラスの最後のテストメソッドの実行後にコールされる
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    /**
     * Fixture: テストの事後設定
     */
//    protected function tearDown(): void
//    {
//        unset(static::$queue);
//    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('apple');

        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('apple');
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('apple', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }

    public function testExceptionThrowWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        static::$queue->push('water');
    }
}