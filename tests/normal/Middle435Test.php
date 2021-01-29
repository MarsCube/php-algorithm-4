<?php


namespace normal;


use Algorithm\normal\m435\EraseOverlapIntervals;
use PHPUnit\Framework\TestCase;

class Middle435Test extends TestCase
{
    public function test()
    {
        $result = EraseOverlapIntervals::handle([[0,2],[1,3],[2,4],[3,5],[4,6]]);
        var_dump($result);
    }
}