<?php


namespace Algorithm\normal\m287;

/**
 * 寻找重复数
 *
 * 给定一个包含n + 1 个整数的数组nums ，其数字都在 1 到 n之间（包括 1 和 n），可知至少存在一个重复的整数。
 * 假设 nums 只有 一个重复的整数 ，找出 这个重复的数 。
 *
 * Class FindDuplicate
 * @package Algorithm\normal\m287
 */
class FindDuplicate
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        $length = count($nums);
        // 深度优先遍历
        for ($i = 0; $i < $length; $i++) {
            if ($nums[$i] == $i + 1) {
                continue;
            }
            $index = $nums[$i];
            $nums[$i] = 0;
            while ($index != 0) {
                if ($nums[$index - 1] == $index) {
                    return $index;
                }
                $temp = $nums[$index - 1];
                $nums[$index - 1] = $index;
                $index = $temp;
            }
        }
        return 0;
    }
}