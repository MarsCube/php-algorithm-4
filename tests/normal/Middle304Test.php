<?php


namespace normal;


use Algorithm\normal\m304\NumMatrix;
use PHPUnit\Framework\TestCase;

class Middle304Test extends TestCase
{
    public function test()
    {
        $matrix = [
            [3, 0, 1, 4, 2],
            [5, 6, 3, 2, 1],
            [1, 2, 0, 1, 5],
            [4, 1, 0, 1, 7],
            [1, 0, 3, 0, 5]
        ];
        $model = new NumMatrix($matrix);
        $this->assertEquals(8, $model->sumRegion(2, 1, 4, 3));
        $this->assertEquals(11, $model->sumRegion(1, 1, 2, 2));
        $this->assertEquals(12, $model->sumRegion(1, 2, 2, 4));
    }
}