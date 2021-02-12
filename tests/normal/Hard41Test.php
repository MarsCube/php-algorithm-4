<?php


namespace normal;


use Algorithm\normal\h41\FirstMissingPositive;
use PHPUnit\Framework\TestCase;

class Hard41Test extends TestCase
{
    public function test() {
        $result = FirstMissingPositive::handle([3,4,-1,1]);
        $this->assertEquals(2, $result);

        $result = FirstMissingPositive::handle([1,2,0]);
        $this->assertEquals(3, $result);

        $result = FirstMissingPositive::handle([7,8,9,11,12]);
        $this->assertEquals(1, $result);
    }
}