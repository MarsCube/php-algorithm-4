<?php


namespace normal;


use Algorithm\normal\h128\LongestConsecutive;
use PHPUnit\Framework\TestCase;

class Hard128Test extends TestCase
{
    public function test()
    {
        $result = LongestConsecutive::handle([100, 4, 200, 1, 3, 2]);
        $this->assertEquals(4, $result);

        $result = LongestConsecutive::handle([0, 3, 7, 2, 5, 8, 4, 6, 0, 1]);
        $this->assertEquals(9, $result);

        $result = LongestConsecutive::handle([-7,-1,3,-9,-4,7,-3,2,4,9,4,-9,8,-7,5,-1,-7]);
        $this->assertEquals(4, $result);
    }
}