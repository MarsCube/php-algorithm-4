<?php


namespace normal;


use Algorithm\normal\m215\FindKthLargest;
use PHPUnit\Framework\TestCase;

class Middle215Test extends TestCase
{
    public function test() {
        $result = FindKthLargest::handle([3,2,1,5,6,4], 2);
        $this->assertEquals(5, $result);
    }
}