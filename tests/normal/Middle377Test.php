<?php


namespace normal;


use Algorithm\normal\m377\CombinationSum4;
use PHPUnit\Framework\TestCase;

class Middle377Test extends TestCase
{
    public function test() {
        $result = (new CombinationSum4())->handle([1, 2, 3], 4);
        $this->assertEquals(7, $result);
    }
}