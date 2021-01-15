<?php


namespace Algorithm\normal\m33;

/**
 * 搜索旋转排序数组
 * 
 * 升序排列的整数数组 nums 在预先未知的某个点上进行了旋转（例如， [0,1,2,4,5,6,7] 经旋转后可能变为  [4,5,6,7,0,1,2] ）。
 * 请你在数组中搜索  target ，如果数组中存在这个目标值，则返回它的索引，否则返回  -1  。
 *
 * Class Search
 * @package Algorithm\normal\m33
 */
class Search
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public static function handle(array $nums, int $target): int
    {
        $start = 0;
        $end = count($nums) - 1;
        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($target == $nums[$middle]) {
                return $middle;
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
        return -1;
    }
}