<?php

use App\Models\Cat;
use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{
    public function testExceptionForAbstractMakeSoundMethod()
    {
        $animalMock = $this->getMockBuilder(Cat::class)
            ->onlyMethods(['makeSound'])
            ->getMock();

        $animalMock->expects($this->once())
            ->method('makeSound')
            ->will($this->throwException(new \Exception('Can not make sound')));

        $this->expectException(Exception::class);
        $this->assertEquals('Meaw', $animalMock->makeSound());
    }
}
