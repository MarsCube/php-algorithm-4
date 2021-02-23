<?php


namespace Algorithm\normal\m120;

/**
 * 三角形最小路径和
 *
 * 给定一个三角形 triangle ，找出自顶向下的最小路径和。
 *
 * 每一步只能移动到下一行中相邻的结点上。相邻的结点 在这里指的是 下标 与 上一层结点下标 相同或者等于 上一层结点下标 + 1 的两个结点。
 * 也就是说，如果正位于当前行的下标 i ，那么下一步可以移动到下一行的下标 i 或 i + 1 。
 *
 * 输入：triangle = [[2],[3,4],[6,5,7],[4,1,8,3]]
 * 输出：11
 * 解释：如下面简图所示：
 * 2
 * 3 4
 * 6 5 7
 * 4 1 8 3
 * 自顶向下的最小路径和为 11（即，2 + 3 + 5 + 1 = 11）。
 *
 * Class MinimumTotal
 * @package Algorithm\normal\m120
 */
class MinimumTotal
{
    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    public static function handle(array $triangle): int
    {
        $count = count($triangle);
        if ($count == 0) {
            return 0;
        }
        $dp = $triangle[0];
        for ($i = 1; $i < $count; $i++) {
            $temp[0] = $triangle[$i][0] + $dp[0];
            for ($j = 1; $j < $i; $j++) {
                $temp[$j] = min($dp[$j], $dp[$j - 1]) + $triangle[$i][$j];
            }
            $temp[$i] = $triangle[$i][$i] + $dp[$i - 1];
            $dp = $temp;
        }
        return min($dp);
    }
}