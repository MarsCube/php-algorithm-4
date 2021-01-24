<?php


namespace normal;


use Algorithm\normal\h321\MaxNumber;
use PHPUnit\Framework\TestCase;

class Hard321Test extends TestCase
{
    public function test() {
        $result = MaxNumber::handle([3,4,6,5], [9,1,2,5,8,3],5);
        $this->assertEquals([9, 8, 6, 5, 3], $result);
    }
}