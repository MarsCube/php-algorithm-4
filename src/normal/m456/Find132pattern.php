<?php


namespace Algorithm\normal\m456;

use SplStack;

/**
 * 132模式
 *
 * 给定一个整数序列：a1, a2, ..., an，
 * 一个132模式的子序列ai, aj, ak被定义为：当 i < j < k 时，ai < ak < aj。
 * 设计一个算法，当给定有 n 个数字的序列时，验证这个序列中是否含有132模式的子序列。
 *
 * Class Find132pattern
 * @package Algorithm\normal\m456
 */
class Find132pattern
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public static function handle(array $nums): bool
    {
        // 最小前缀+单调栈
        $length = sizeof($nums);
        if ($length < 3) {
            return false;
        }
        $min_array = array_fill(0, $length - 1, 0);
        $min_array[1] = $nums[0];
        for ($i = 1; $i < $length - 2; $i++) {
            $min_array[$i + 1] = min($nums[$i], $min_array[$i]);
        }
        $stack = new SplStack();
        $stack->push($nums[$length - 1]);
        // 从倒数第二个向前
        for ($i = $length - 2; $i >= 1; $i--) {
            if ($min_array[$i] < $nums[$i]) {
                while (!$stack->isEmpty() && $stack->top() <= $min_array[$i]) {
                    $stack->pop();
                }
                if (!$stack->isEmpty() && $stack->top() > $min_array[$i] && $stack->top() < $nums[$i]) {
                    return true;
                }
            }
            $stack->push($nums[$i]);
        }
        return false;
    }
}