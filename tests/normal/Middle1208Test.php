<?php


namespace normal;


use Algorithm\normal\m1208\EqualSubstring;
use PHPUnit\Framework\TestCase;

class Middle1208Test extends TestCase
{
    public function test()
    {
        $s = "abcd";
        $t = "bcdf";
        $cost = 3;
        $this->assertEquals(3, EqualSubstring::handle($s, $t, $cost));

        $s = "abcd";
        $t = "cdef";
        $cost = 3;
        $this->assertEquals(1, EqualSubstring::handle($s, $t, $cost));

        $s = "abcd";
        $t = "acde";
        $cost = 0;
        $this->assertEquals(1, EqualSubstring::handle($s, $t, $cost));
    }
}