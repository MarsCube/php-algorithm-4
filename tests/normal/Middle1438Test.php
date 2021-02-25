<?php


namespace normal;


use Algorithm\normal\m1438\LongestSubarray;
use PHPUnit\Framework\TestCase;

class Middle1438Test extends TestCase
{
    public function test()
    {
        $result = LongestSubarray::handle([10, 1, 2, 4, 7, 2], 5);
        $this->assertEquals(4, $result);

        $result = LongestSubarray::handle([4, 2, 2, 2, 4, 4, 2, 2], 0);
        $this->assertEquals(3, $result);
    }
}