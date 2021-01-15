<?php


namespace Algorithm\normal\h154;

/**
 * 寻找旋转排序数组中的最小值 II
 *
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 * ( 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] )。
 * 请找出其中最小的元素。注意数组中可能存在重复的元素。
 *
 * 输入: [2,2,2,0,1]
 * 输出: 0
 *
 * Class FindMin
 * @package Algorithm\normal\h154
 */
class FindMin
{
    public static function handle(array $nums): int
    {
        $len = count($nums);
        if ($len == 0) {
            return 0;
        }
        $left = 0;
        $right = $len - 1;

        while ($left < $right) {
            $middle = intdiv(($left + $right), 2);
            if ($nums[$middle] < $nums[$right]) {
                $right = $middle;
            } elseif ($nums[$middle] > $nums[$right]) {
                $left = $middle + 1;
            } else {
                $right--;
            }
        }
        return $nums[$left];
    }
}