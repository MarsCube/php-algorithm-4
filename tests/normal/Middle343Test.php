<?php


namespace normal;


use Algorithm\normal\m343\IntegerBreak;
use PHPUnit\Framework\TestCase;

class Middle343Test extends TestCase
{
    public function test()
    {
        $result = IntegerBreak::handle(10);
        $this->assertEquals(36, $result);

        $result = IntegerBreak::handle(8);
        $this->assertEquals(18, $result);
    }
}