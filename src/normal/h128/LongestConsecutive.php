<?php


namespace Algorithm\normal\h128;

/**
 * 最长连续序列
 *
 * 给定一个未排序的整数数组 nums ，找出数字连续的最长序列（不要求序列元素在原数组中连续）的长度。
 *
 * 你可以设计并实现时间复杂度为 O(n) 的解决方案吗？
 *
 * Class LongestConsecutive
 * @package Algorithm\normal\h128
 */
class LongestConsecutive
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        $start_map = [];
        $end_map = [];
        // 去重
        $visited = [];
        $length = count($nums);

        $max = 0;
        for ($i = 0; $i < $length; $i++) {
            $num = $nums[$i];
            if (isset($visited[$num])) {
                continue;
            }
            $visited[$num] = true;
            $start = $end = $num;
            if (isset($start_map[$num + 1])) {
                $end = $start_map[$num + 1];
                unset($start_map[$num + 1]);
            }
            if (isset($end_map[$num - 1])) {
                $start = $end_map[$num - 1];
                unset($end_map[$num - 1]);
            }
            $start_map[$start] = $end;
            $end_map[$end] = $start;
            $max = max($max, $end - $start + 1);
        }
        return $max;
    }
}