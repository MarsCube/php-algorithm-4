<?php


namespace normal;


use Algorithm\normal\m376\WiggleMaxLength;
use PHPUnit\Framework\TestCase;

class Middle376Test extends TestCase
{
    public function test() {
        $result = WiggleMaxLength::handle([1,7,4,9,2,5]);
        $this->assertEquals(6, $result);
    }
}