<?php


namespace normal;


use Algorithm\normal\m56\Merge;
use PHPUnit\Framework\TestCase;

class Middle56Test extends TestCase
{
    public function test() {
        $result = Merge::handle([[1,3],[2,6],[8,10],[15,18]]);
        $this->assertEquals([[1,6],[8,10],[15,18]], $result);
    }
}