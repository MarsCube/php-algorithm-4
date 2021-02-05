<?php


namespace normal;


use Algorithm\normal\m866\PrimePalindrome;
use PHPUnit\Framework\TestCase;

class Middle866Test extends TestCase
{
    public function test()
    {
        $result = PrimePalindrome::handle(13);
        $this->assertEquals(101, $result);
    }
}