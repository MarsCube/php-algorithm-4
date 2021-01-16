<?php


namespace normal;


use Algorithm\normal\m31\NextPermutation;
use PHPUnit\Framework\TestCase;

class Middle31Test extends TestCase
{
    public function test() {
        $result = [1, 5, 1];
        NextPermutation::handle($result);
        $this->assertEquals([5, 1, 1], $result);
    }
}