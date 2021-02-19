<?php


namespace Algorithm\normal\m1004;

use SplQueue;

/**
 * 最大连续1的个数 III
 *
 * 给定一个由若干 0 和 1 组成的数组 A，我们最多可以将 K 个值从 0 变成 1 。
 *
 * 返回仅包含 1 的最长（连续）子数组的长度。
 *
 * Class LongestOnes
 * @package Algorithm\normal\m1004
 */
class LongestOnes
{
    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public static function handle(array $A, int $K): int
    {
        // 一趟遍历，0向后滑动
        // 用一个队列记录0的位置
        $queue = new SplQueue();
        $length = count($A);
        $max = 0;
        $start = -1;
        for ($i = 0; $i < $length; $i++) {
            if ($A[$i] == 0) {
                if ($queue->count() < $K) {
                    $queue->enqueue($i);
                } else {
                    if ($K > 0) {
                        $start = $queue->dequeue();
                    } else {
                        $start = $i;
                    }
                    $queue->push($i);
                }
            }
            $max = max($max, $i - $start);
        }
        return $max;
    }
}