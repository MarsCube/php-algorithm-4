<?php


namespace normal;


use Algorithm\normal\m375\GetMoneyAmount;
use PHPUnit\Framework\TestCase;

class Middle375Test extends TestCase
{
    public function test() {
        $result = GetMoneyAmount::handle(10);
        $this->assertEquals(16, $result);
    }
}