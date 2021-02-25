<?php


namespace Algorithm\normal\m1438;

use SplQueue;

/**
 * 绝对差不超过限制的最长连续子数组
 *
 * 给你一个整数数组 nums ，和一个表示限制的整数 limit，请你返回最长连续子数组的长度，
 * 该子数组中的任意两个元素之间的绝对差必须小于或者等于 limit 。
 *
 * 如果不存在满足条件的子数组，则返回 0 。
 *
 * Class LongestSubarray
 * @package Algorithm\normal\m1438
 */
class LongestSubarray
{
    /**
     * @var SplQueue 单调递增栈
     */
    private static $incr;

    /**
     * @var SplQueue 单调递减栈
     */
    private static $decr;

    /**
     * @param Integer[] $nums
     * @param Integer $limit
     * @return Integer
     */
    public static function handle(array $nums, int $limit): int
    {
        self::$incr = new SplQueue();
        self::$decr = new SplQueue();
        $left = 0;
        $length = count($nums);
        $result = 0;
        for ($i = 0; $i < $length; $i++) {
            self::incr($nums[$i]);
            self::decr($nums[$i]);
            while (!self::$incr->isEmpty() && !self::$incr->isEmpty() && self::$decr->bottom() - self::$incr->bottom() > $limit) {
                if ($nums[$left] == self::$decr->bottom()) {
                    self::$decr->dequeue();
                }
                if ($nums[$left] == self::$incr->bottom()) {
                    self::$incr->dequeue();
                }
                $left++;
            }
            $result = max($result, $i - $left + 1);
        }
        return $result;
    }

    private static function incr($num)
    {
        while (!self::$incr->isEmpty() && $num < self::$incr->top()) {
            self::$incr->pop();
        }
        self::$incr->enqueue($num);
    }

    private static function decr($num)
    {
        while (!self::$decr->isEmpty() && $num > self::$decr->top()) {
            self::$decr->pop();
        }
        self::$decr->enqueue($num);
    }
}