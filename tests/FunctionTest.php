<?php

require_once 'src/Methods/functions.php';

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddResultsInCorrectSum()
    {
        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(14, add(12, 2));
        $this->assertEquals(5, add(3, 2));
    }

    public function testAddDoesNotResultInIncorrectSum()
    {
        $this->assertNotEquals(4, add(3, 2));
    }
}
