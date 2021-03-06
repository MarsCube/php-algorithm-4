<?php


namespace Algorithm\normal\m503;

use SplStack;

/**
 * 下一个更大元素 II
 * 给定一个循环数组（最后一个元素的下一个元素是数组的第一个元素），
 * 输出每个元素的下一个更大元素。数字 x 的下一个更大的元素是按数组遍历顺序，
 * 这个数字之后的第一个比它更大的数，这意味着你应该循环地搜索它的下一个更大的数。
 * 如果不存在，则输出 -1。
 *
 * Class NextGreaterElements
 * @package Algorithm\normal\m503
 */
class NextGreaterElements
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public static function handle(array $nums): array
    {
        $length = sizeof($nums);
        $result = array_fill(0, $length, -1);
        $stack = new SplStack();
        for ($i = 0; $i < 2 * $length - 1; $i++) {
            $index = $i % $length;
            // 如果顶部元素小于当前值，栈中比当前元素小的下一个最大值均为当前值
            while (!$stack->isEmpty() && $nums[$stack->top()] < $nums[$index]) {
                $result[$stack->pop()] = $nums[$index];
            }
            $stack->push($index);
        }
        return $result;
    }
}