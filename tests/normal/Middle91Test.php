<?php


namespace normal;


use Algorithm\normal\m91\NumDecodings;
use PHPUnit\Framework\TestCase;

class Middle91Test extends TestCase
{
    public function test()
    {
        $result = NumDecodings::handle('12');
        $this->assertEquals(2, $result);

        $result = NumDecodings::handle('226');
        $this->assertEquals(3, $result);

        $result = NumDecodings::handle('0');
        $this->assertEquals(0, $result);
    }
}