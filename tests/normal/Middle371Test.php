<?php


namespace normal;


use Algorithm\normal\m371\GetSum;
use PHPUnit\Framework\TestCase;

class Middle371Test extends TestCase
{
    public function test()
    {
        $this->assertEquals(11, GetSum::handle(5, 6));
    }
}