<?php


namespace normal;


use Algorithm\normal\m264\NthUglyNumber;
use PHPUnit\Framework\TestCase;

class Middle264Test extends TestCase
{
    public function test()
    {
        $result = NthUglyNumber::handle(10);
    }
}