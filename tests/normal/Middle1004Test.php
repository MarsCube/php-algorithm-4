<?php


namespace normal;


use Algorithm\normal\m1004\LongestOnes;
use PHPUnit\Framework\TestCase;

class Middle1004Test extends TestCase
{
    public function test()
    {
        $result = LongestOnes::handle([1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0], 2);
        $this->assertEquals(6, $result);

        $result = LongestOnes::handle([0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1], 3);
        $this->assertEquals(10, $result);

        $result = LongestOnes::handle([0, 0, 1, 1, 1, 0, 0], 0);
        $this->assertEquals(3, $result);
    }
}