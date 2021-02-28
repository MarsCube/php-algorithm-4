<?php


namespace normal;


use Algorithm\normal\m424\CharacterReplacement;
use PHPUnit\Framework\TestCase;

class Middle424Test extends TestCase
{
    public function test()
    {
        $result = CharacterReplacement::handle("AABABBA", 1);
        $this->assertEquals(4, $result);
    }
}