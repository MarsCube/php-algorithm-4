<?php


namespace Algorithm\normal\m55;

/**
 * 跳跃游戏
 *
 * 给定一个非负整数数组 nums ，你最初位于数组的 第一个下标 。
 *
 * 数组中的每个元素代表你在该位置可以跳跃的最大长度。
 *
 * 判断你是否能够到达最后一个下标。
 *
 * Class CanJump
 * @package Algorithm\normal\m55
 */
class CanJump
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public static function handle(array $nums): bool
    {
        $length = count($nums);
        $max_right = 0;
        for ($i = 0; $i < $length; $i++) {
            if ($i > $max_right) {
                return false;
            }
            $max_right = max($i + $nums[$i], $max_right);
            if ($max_right >= $length - 1) {
                return true;
            }
        }
        return false;
    }
}