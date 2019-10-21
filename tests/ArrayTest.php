<?php

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{

    public $array;

    protected function setUp()
    {
        $this->array = [];
    }

    public function testArrayInitiallyHasOneItem()
    {

        $this->array[] = 'one';

        $this->assertNotEmpty($this->array);
        $this->assertEquals("one", $this->array[0]);
    }

    public function testCanAddItemToArray()
    {

        $this->array[] = 'one';
        $this->array[] = "two";

        $this->assertEquals("two", $this->array[1]);
        $this->assertCount(2, $this->array);
    }
}
