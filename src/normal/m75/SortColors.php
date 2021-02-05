<?php


namespace Algorithm\normal\m75;

/**
 * 颜色分类
 *
 * 给定一个包含红色、白色和蓝色，一共 n 个元素的数组，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
 * 此题中，我们使用整数 0、 1 和 2 分别表示红色、白色和蓝色。
 * 输入：nums = [2,0,2,1,1,0]
 * 输出：[0,0,1,1,2,2]
 *
 * Class SortColors
 * @package Algorithm\normal\m75
 */
class SortColors
{
    /**
     * @param Integer[] $nums
     */
    public static function handle(array &$nums)
    {
        // pos0 标识 0 --- pos0 -1 得数都为0
        // pos1 标识 pos00 --- pos1 -1 得数都为1
        $pos0 = $pos1 = 0;
        $length = count($nums);
        for ($i = 0; $i < $length - 1; $i++) {
            if ($nums[$i] == 0) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$pos1];
                $nums[$pos1] = $nums[$pos0];
                $nums[$pos0] = $temp;
                $pos0++;
                $pos1++;
            } elseif ($nums[$i] == 1) {
                $temp = $nums[$i];
                $nums[$i] = $nums[$pos1];
                $nums[$pos1] = $temp;
                $pos1++;
            }
        }
    }
}