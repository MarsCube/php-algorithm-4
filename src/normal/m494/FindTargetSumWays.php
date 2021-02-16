<?php


namespace Algorithm\normal\m494;

/**
 * 目标和
 *
 * 给定一个非负整数数组，a1, a2, ..., an, 和一个目标数，S。现在你有两个符号 + 和 -。对于数组中的任意一个整数，
 * 你都可以从 + 或 - 中选择一个符号添加在前面。
 *
 * 返回可以使最终数组和为目标数 S 的所有添加符号的方法数。
 *
 * Class FindTargetSumWays
 * @package Algorithm\normal\m494
 */
class FindTargetSumWays
{
    private static $map;

    private static $resultMap;

    /**
     * @param Integer[] $nums
     * @param Integer $S
     * @return Integer
     */
    public static function handle(array $nums, int $S): int
    {
        // 遍历nums，获取到每阶段的最大值
        $length = count($nums);
        if ($length == 0) {
            return 0;
        }
        self::$map = array_fill(0, $length, 0);
        self::$resultMap = [];
        self::$map[0] = $nums[0];
        for ($i = 1; $i < $length; $i++) {
            self::$map[$i] = self::$map[$i - 1] + $nums[$i];
        }
        return self::helper($nums, $S, $length - 1);
    }

    /**
     * @param array $nums
     * @param int $S
     * @param int $index
     * @return int
     */
    private static function helper(array &$nums, int $S, int $index): int
    {
        if ($index < 0 || abs($S) > self::$map[$index]) {
            return $S == 0 ? 1 : 0;
        }
        $key = abs($S) . '-' . $index;
        if (!isset(self::$resultMap[$key])) {
            self::$resultMap[$key] = self::helper($nums, $S - $nums[$index], $index - 1) + self::helper($nums, $S + $nums[$index], $index - 1);
        }
        return self::$resultMap[$key];
    }
}