<?php


namespace normal;


use Algorithm\normal\m229\MajorityElement;
use PHPUnit\Framework\TestCase;

class Middle229Test extends TestCase
{
    public function test()
    {
        $result = MajorityElement::handle([0, 0, 0]);
        $this->assertEquals([0], $result);
    }
}