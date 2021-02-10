<?php


namespace normal;


use Algorithm\normal\m567\CheckInclusion;
use PHPUnit\Framework\TestCase;

class Middle567Test extends TestCase
{
    public function test()
    {
        $result = CheckInclusion::handle('ab', 'eidbaooo');
        $this->assertTrue($result);

        $result = CheckInclusion::handle('ab', 'eidboaoo');
        $this->assertFalse($result);
    }
}