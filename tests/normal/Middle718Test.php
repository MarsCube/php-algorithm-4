<?php


namespace normal;


use Algorithm\normal\m718\FindLength;
use PHPUnit\Framework\TestCase;

class Middle718Test extends TestCase
{
    public function test()
    {
        $result = FindLength::handle([1,2,3,2,1], [3,2,1,4,7]);
        $this->assertEquals(3, $result);
    }
}