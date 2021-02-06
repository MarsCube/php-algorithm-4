<?php


namespace Algorithm\normal\m80;

/**
 * 删除排序数组中的重复项 II
 *
 * 给定一个增序排列数组 nums ，你需要在 原地 删除重复出现的元素，使得每个元素最多出现两次，返回移除后数组的新长度。
 *
 * 不要使用额外的数组空间，你必须在 原地 修改输入数组 并在使用 O(1) 额外空间的条件下完成。
 *
 * Class RemoveDuplicates
 * @package Algorithm\normal\m80
 */
class RemoveDuplicates
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        $flag = false;
        $length = count($nums);
        $slow = 0;
        for ($i = 1; $i < $length; $i++) {
            if ($nums[$i] == $nums[$slow]) {
                if (!$flag) {
                    $flag = true;
                    self::swap($nums, ++$slow, $i);
                }
            } else {
                self::swap($nums, ++$slow, $i);
                $flag = false;
            }
        }
        return $slow + 1;
    }

    private static function swap(&$num, $i, $j) {
        $temp = $num[$i];
        $num[$i] = $num[$j];
        $num[$j] = $temp;
    }
}