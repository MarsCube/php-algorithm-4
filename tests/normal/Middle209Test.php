<?php


namespace normal;


use Algorithm\normal\m209\MinSubArrayLen;
use PHPUnit\Framework\TestCase;

class Middle209Test extends TestCase
{
    public function test() {
        $result = MinSubArrayLen::handle(11, [1, 1, 1, 1, 1, 1]);
        $this->assertEquals(0, $result);
    }
}