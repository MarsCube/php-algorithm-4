<?php


namespace normal;


use Algorithm\normal\m973\KClosest;
use PHPUnit\Framework\TestCase;

class Middle973Test extends TestCase
{
    public function test()
    {
        $result = KClosest::handle([[1, 3], [-2, 2]], 1);
        $this->assertEquals([[-2, 2]], $result);

        $result = KClosest::handle([[3, 3], [5, -1], [-2, 4]], 2);
        $this->assertEquals([[-2, 4], [3, 3]], $result);
    }
}