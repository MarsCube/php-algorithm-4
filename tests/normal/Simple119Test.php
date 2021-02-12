<?php


namespace normal;


use Algorithm\normal\s119\GetRow;
use PHPUnit\Framework\TestCase;

class Simple119Test extends TestCase
{
    public function test()
    {
        $result = GetRow::handle(3);
        $this->assertEquals([1, 3, 3, 1], $result);

        $result = GetRow::handle(2);
        $this->assertEquals([1, 2, 1], $result);
    }
}