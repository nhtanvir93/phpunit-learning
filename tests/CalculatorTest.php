<?php

use App\Models\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    public function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function additionProvider()
    {
        return [
            [1, 2, 3],
            [3, 2, 5],
            [0, 1, 1],
            [2, 0, 2]
        ];
    }

    /**
     * @dataProvider additionProvider
     *
     * @param integer $num1
     * @param integer $num2
     * @param integer $sum
     * @return void
     */
    public function testValidAddition(int $num1, int $num2, int $sum)
    {
        $this->assertEquals($sum, $this->calculator->add($num1, $num2));
    }
}
