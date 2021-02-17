<?php


namespace normal;


use Algorithm\normal\m386\LexicalOrder;
use PHPUnit\Framework\TestCase;

class Middle386Test extends TestCase
{
    public function test()
    {
        $this->assertEquals([1, 10, 11, 12, 13, 2, 3, 4, 5, 6, 7, 8, 9], LexicalOrder::handle(13));
    }
}