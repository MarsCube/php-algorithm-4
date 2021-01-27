<?php


namespace Algorithm\normal\m152;

/**
 * 乘积最大子数组
 *
 * 给你一个整数数组 nums ，请你找出数组中乘积最大的连续子数组（该子数组中至少包含一个数字），并返回该子数组所对应的乘积。
 *
 * Class MaxProduct
 * @package Algorithm\normal\m152
 */
class MaxProduct
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        // 因为正数会变负数，所以记一个最大值，记一个最小值
        $max = $min = $result = $nums[0];
        $length = count($nums);
        for ($i = 1; $i < $length; $i++) {
            $mx = $max;
            $max = max($max * $nums[$i], $nums[$i], $min * $nums[$i]);
            $min = min($min * $nums[$i], $nums[$i], $mx * $nums[$i]);
            $result = max($result, $max);
        }
        return $result;
    }
}