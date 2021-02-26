<?php


namespace Algorithm\normal\m343;

/**
 * 整数拆分
 *
 * 给定一个正整数 n，将其拆分为至少两个正整数的和，并使这些整数的乘积最大化。
 * 返回你可以获得的最大乘积。
 *
 * Class IntegerBreak
 * @package Algorithm\normal\m343
 */
class IntegerBreak
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        // 拆成无数多个3
        if ($n < 4) {
            return $n - 1;
        }
        $sum = 1;
        while ($n > 4) {
            $sum *= 3;
            $n -= 3;
        }
        return $sum * $n;
    }
}