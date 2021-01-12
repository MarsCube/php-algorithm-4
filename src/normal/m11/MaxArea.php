<?php


namespace Algorithm\normal\m11;

/**
 * 给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点 (i, ai) 。
 * 在坐标内画 n 条垂直线，垂直线 i 的两个端点分别为 (i, ai) 和 (i, 0) 。
 * 找出其中的两条线，使得它们与 x 轴共同构成的容器可以容纳最多的水。
 *
 * 说明：你不能倾斜容器。
 *
 * Class MaxArea
 * @package Algorithm\normal\m11
 */
class MaxArea
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    public function handle(array $height): int
    {
        $left = 0;
        $right = count($height) - 1;
        $max = 0;
        $l_max = $height[$left];
        $r_max = $height[$right];
        while ($left < $right) {
            $max = max($max, ($right - $left) * min($height[$left], $height[$right]));
            if ($height[$left] < $height[$right]) {
                $left++;
                // 加while是为了节约乘法运算
                while ($height[$left] < $l_max) {
                    $left++;
                }
                $l_max = $height[$left];
            } else {
                $right--;
                while ($height[$right] < $r_max) {
                    $right--;
                }
                $r_max = $height[$right];
            }
        }
        return $max;
    }
}