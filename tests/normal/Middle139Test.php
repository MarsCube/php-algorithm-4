<?php


namespace normal;


use Algorithm\normal\m139\WordBreak;
use PHPUnit\Framework\TestCase;

class Middle139Test extends TestCase
{
    public function test()
    {
        $result = WordBreak::handle("a", ["a"]);
        $this->assertTrue($result);
    }
}