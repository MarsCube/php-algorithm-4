<?php


namespace normal;


use Algorithm\normal\m120\MinimumTotal;
use PHPUnit\Framework\TestCase;

class Middle120Test extends TestCase
{
    public function test()
    {
        $triangle = [[2],[3,4],[6,5,7],[4,1,8,3]];
        $result = MinimumTotal::handle($triangle);
        $this->assertEquals(11, $result);

        $triangle = [[-10]];
        $result = MinimumTotal::handle($triangle);
        $this->assertEquals(-10, $result);
    }
}