<?php


namespace Algorithm\normal\m81;

/**
 * 搜索旋转排序数组 II
 *
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 * ( 例如，数组 [0,0,1,2,2,5,6] 可能变为 [2,5,6,0,0,1,2] )。
 * 编写一个函数来判断给定的目标值是否存在于数组中。若存在返回 true，否则返回 false。
 *
 * 输入: nums = [2,5,6,0,0,1,2], target = 0
 * 输出: true
 *
 * Class Search
 * @package Algorithm\normal\m81
 */
class Search
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    public static function handle(array $nums, int $target): bool
    {
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($target == $nums[$middle]) {
                return true;
            }

            // 判断有序性
            if ($nums[$middle] < $nums[$end]) { // 右侧有序  middle + 1 --- end
                if ($target > $nums[$middle] && $target <= $nums[$end]) { // 去有序区寻找
                    $start = $middle + 1;
                } else { // 去无序区寻找
                    $end = $middle - 1;
                }
            } elseif ($nums[$middle] > $nums[$end]) { // 左侧有序 start --- middle -1
                if ($target >= $nums[$start] && $target < $nums[$middle]) { // 去有序区寻找
                    $end = $middle - 1;
                } else { // 去无序区寻找
                    $start = $middle + 1;
                }
            } else {
                // 1 1 1 1 1 1 0 1 1 1
                // 1 1 1 0 1 1 1 1 1 1
                // 无法区分哪边有序，但最后一个可以排除，由于：target == nums[middle]
                $end--;
            }
        }
        return false;
    }
}