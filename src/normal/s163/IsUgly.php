<?php


namespace Algorithm\normal\s163;

/**
 * 丑数
 *
 * 编写一个程序判断给定的数是否为丑数。
 * 丑数就是只包含质因数 2, 3, 5 的正整数。
 *
 * Class IsUgly
 * @package Algorithm\normal\s163
 */
class IsUgly
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    public static function handle(int $num): bool
    {
        if ($num == 0) {
            return false;
        }
        while ($num != 1) {
            if ($num % 2 == 0) {
                $num = $num / 2;
            } elseif ($num % 3 == 0) {
                $num = $num / 3;
            } elseif ($num % 5 == 0) {
                $num = $num / 5;
            } else {
                return false;
            }
        }
        return true;
    }
}