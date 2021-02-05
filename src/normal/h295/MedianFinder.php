<?php


namespace Algorithm\normal\h295;

use SplMaxHeap;
use SplMinHeap;

/**
 * 数据流的中位数
 *
 * Class MedianFinder
 * @package Algorithm\normal\h295
 */
class MedianFinder
{
    /**
     * @var SplMinHeap
     */
    private $min_heap;

    /**
     * @var SplMaxHeap
     */
    private $max_heap;

    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->min_heap = new SplMinHeap();
        $this->max_heap = new SplMaxHeap();
    }

    /**
     * @param Integer $num
     */
    function addNum(int $num)
    {
        // 保证小顶堆的个数 >= 大顶堆
        $this->max_heap->insert($num);
        $this->min_heap->insert($this->max_heap->extract());
        if ($this->min_heap->count() - $this->max_heap->count() > 1) {
            $this->max_heap->insert($this->min_heap->extract());
        }
    }

    /**
     * @return Float
     */
    function findMedian(): float
    {
        if ($this->min_heap->count() == $this->max_heap->count()) {
            return (double)(($this->min_heap->top() + $this->max_heap->top()) / 2);
        }
        return (double)($this->min_heap->top());
    }
}