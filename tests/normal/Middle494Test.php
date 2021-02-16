<?php


namespace normal;


use Algorithm\normal\m494\FindTargetSumWays;
use PHPUnit\Framework\TestCase;

class Middle494Test extends TestCase
{
    public function test() {
        $this->assertEquals(6534, FindTargetSumWays::handle([35,16,11,38,44,5,17,20,23,0,27,46,38,29,22,18,27,34,12,10], 22));

        $this->assertEquals(5, FindTargetSumWays::handle([1, 1, 1, 1, 1], 3));

        $this->assertEquals(2248, FindTargetSumWays::handle([2,107,109,113,127,131,137,3,2,3,5,7,11,13,17,19,23,29,47,53], 132));

    }
}