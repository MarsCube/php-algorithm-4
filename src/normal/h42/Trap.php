<?php


namespace Algorithm\normal\h42;

/**
 * 给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
 *
 * Class Trap
 * @package Algorithm\normal\h42
 */
class Trap
{
    /**
     * 解题思路：累加每根柱子上的存水量
     *
     * @param Integer[] $height
     * @return Integer
     */
    public static function handle(array $height): int
    {
        $count = count($height);
        // 第一次遍历，获取到每根柱子从右向左望的最大值
        $l_max = 0;
        $l_max_arr = array_fill(0, $count, 0);
        for ($i = 0; $i < $count; $i++) {
            $l_max = max($l_max, $height[$i]);
            $l_max_arr[$i] = $l_max;
        }
        // 第二次遍历，获取到每根柱子从左向右望的最大值
        // 第二次遍历时同时计算每根柱子上的存水量
        // 由于不需要二次使用，可以不使用数组存放
        $r_max = 0;
        $result = 0;
        for ($i = $count - 1; $i > 0; $i--) {
            $r_max = max($r_max, $height[$i]);
            $result += min($r_max, $l_max_arr[$i]) - $height[$i];
        }
        return $result;
    }
}