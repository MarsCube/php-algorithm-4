<?php


namespace Algorithm\normal\h41;

/**
 * 缺失的第一个正数
 *
 * 给你一个未排序的整数数组 nums ，请你找出其中没有出现的最小的正整数。
 *
 * 进阶：你可以实现时间复杂度为 O(n) 并且只使用常数级别额外空间的解决方案吗？
 *
 * Class FirstMissingPositive
 * @package Algorithm\normal\h41
 */
class FirstMissingPositive
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        // 和之前的一道置换题很像
        $length = sizeof($nums);
        for ($i = 0; $i < $length; $i++) {
            if ($nums[$i] <= 0 || $nums[$i] == $i + 1) {
                continue;
            }
            $index = $nums[$i];
            $nums[$i] = 0;
            while ($index > 0 && $index <= $length && $nums[$index - 1] !== $index) {
                $temp = $nums[$index - 1];
                $nums[$index - 1] = $index;
                $index = $temp;
            }
        }
        for ($i = 0; $i < $length; $i++) {
            if ($i + 1 != $nums[$i]) {
                return $i + 1;
            }
        }
        return $length + 1;
    }
}