<?php


namespace Algorithm\normal\m209;

/**
 * 长度最小的子数组
 * 给定一个含有n个正整数的数组和一个正整数s ，
 * 找出该数组中满足其和 ≥ s 的长度最小的 连续 子数组，并返回其长度。
 * 如果不存在符合条件的子数组，返回 0。
 *
 * Class MinSubArrayLen
 * @package Algorithm\normal\m209
 */
class MinSubArrayLen
{
    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(int $target, array $nums): int
    {
        $length = count($nums);
        $result = $length + 1;
        $left = 0;
        $sum = 0;
        for ($i = 0; $i < $length; $i++) {
            $sum += $nums[$i];
            while ($sum >= $target) {
                $result = min($result, $i - $left + 1);
                $sum -= $nums[$left];
                $left++;
            }
            if ($result == 1) {
                break;
            }
        }
        return $result > $length ? 0 : $result;
    }
}