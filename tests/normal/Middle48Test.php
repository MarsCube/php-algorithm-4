<?php


namespace normal;


use Algorithm\normal\m48\Rotate;
use PHPUnit\Framework\TestCase;

class Middle48Test extends TestCase
{
    public function test() {
        $matrix = [[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]];
        Rotate::handle($matrix);
        $this->assertEquals([[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]], $matrix);
    }
}