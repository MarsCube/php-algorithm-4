<?php


namespace normal;


use Algorithm\normal\m12\IntToRoman;
use PHPUnit\Framework\TestCase;

class Middle12Test extends TestCase
{
    public function test()
    {
        $result = IntToRoman::handle(3999);
        $this->assertEquals('MMMCMXCIX', $result);
    }
}