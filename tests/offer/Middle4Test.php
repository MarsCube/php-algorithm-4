<?php


namespace offer;


use Algorithm\offer\m4\FindNumberIn2DArray;
use PHPUnit\Framework\TestCase;

class Middle4Test extends TestCase
{
    public function test()
    {
        $matrix = [
            [1, 4, 7, 11, 15],
            [2, 5, 8, 12, 19],
            [3, 6, 9, 16, 22],
            [10, 13, 14, 17, 24],
            [18, 21, 23, 26, 30]
        ];
        $this->assertTrue(FindNumberIn2DArray::handle($matrix, 5));

        $this->assertFalse(FindNumberIn2DArray::handle($matrix, 20));

        $matrix = [[1, 3, 5]];
        $this->assertTrue(FindNumberIn2DArray::handle($matrix, 3));

    }
}