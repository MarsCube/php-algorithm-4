<?php


namespace normal;


use Algorithm\normal\h295\MedianFinder;
use PHPUnit\Framework\TestCase;

class Hard295Test extends TestCase
{
    public function test()
    {
        $function = ["MedianFinder","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian"];
        $args = [[],[-1],[],[-2],[],[-3],[],[-4],[],[-5],[]];
        $result = [null];
        $medianFinder = new MedianFinder();
        for ($i = 1; $i < count($function); $i++) {
            if ($function[$i] == 'addNum') {
                $result[] = $medianFinder->addNum($args[$i][0]);
            } else {
                $result[] = $medianFinder->findMedian();
            }
        }
        $this->assertEquals([null, null, -1, null, -1.5, null, -2, null, -2.5, null, -3], $result);
    }
}