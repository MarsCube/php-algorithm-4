<?php


namespace Algorithm\normal\m300;

/**
 * 最长递增子序列
 *
 * 给你一个整数数组 nums ，找到其中最长严格递增子序列的长度。
 * 子序列是由数组派生而来的序列，删除（或不删除）数组中的元素而不改变其余元素的顺序。
 * 例如，[3,6,2,7] 是数组 [0,3,1,6,2,2,7] 的子序列。
 *
 * 示例 1：
 *
 * 输入：nums = [10,9,2,5,3,7,101,18]
 * 输出：4
 * 解释：最长递增子序列是 [2,3,7,101]，因此长度为 4 。
 *
 * Class LengthOfLIS
 * @package Algorithm\normal\m300
 */
class LengthOfLIS
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        /**
         * 方案1：动态规划
         * dp数组记录数组中每个值结尾的 子序列的最大长度
         * 遍历 nums 数组，每次 以 nums[i] 结尾的子序列的长度为基础更新「位置> i&&值>nums[i]」的值的长度
         * 时间复杂度为O(n**2)，算法较简单
         */

        /**
         * 方案2：线段树「需要学习」
         */

        /**
         * 方案3：动态规划 + 二分 「重点记忆」
         *
         * 核心论证点：
         * 1. dp数组记录 所有子序列长度的为i的 子序列中 最后一位最小的值。 len记录当前最大的子序列长度
         * 2. dp数组单调递增
         * 3. 二分法描述太麻烦，看代码意会
         */
        $count = count($nums);
        if (count($nums) == 0) {
            return 0;
        }
        $dp = array_fill(0, $count + 1, null);
        $len = 1;
        $dp[$len] = $nums[0];
        for ($i = 1; $i < $count; $i++) {
            // 如果当前值比 最大子序列长度中的最后一个值还大，新的最大子序列长度要加1，初始化新的最大子序列最后一个元素的最小值
            if ($nums[$i] > $dp[$len]) {
                $dp[++$len] = $nums[$i];
            } elseif ($nums[$i] < $dp[$len]) {
                // 说明以当前元素结尾的子序列不必当前的大
                // 而dp前面必有一个值记录的不是最小，把它找到
                $pos = self::binarySearch($dp, 1, $len, $nums[$i]);
                $dp[$pos] = $nums[$i];
            }
        }
        return $len;
    }

    /**
     * 从 $arr 中找一个比 $target 大的最小值
     *
     * @param $arr
     * @param $start
     * @param $end
     * @param $target
     * @return int
     */
    private static function binarySearch(&$arr, $start, $end, $target): int
    {
        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($arr[$middle] < $target) {
                $start = $middle + 1;
            } elseif ($arr[$middle] > $target) {
                $end = $middle - 1;
            } else {
                return $middle;
            }
        }
        return $start;
    }
}