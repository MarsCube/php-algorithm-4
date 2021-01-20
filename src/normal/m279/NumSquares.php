<?php


namespace Algorithm\normal\m279;

/**
 * 完全平方数
 *
 * 给定正整数 n，找到若干个完全平方数（比如 1, 4, 9, 16, ...）使得它们的和等于 n。你需要让组成和的完全平方数的个数最少。
 *
 * Class NumSquares
 * @package Algorithm\normal\m279
 */
class NumSquares
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        // 动态规划
        $max_index = (int)sqrt($n);
        $square_arr = array_fill(0,$max_index + 1, 0);
        for ($i = 1; $i <= $max_index; $i++) {
            $square_arr[$i] = $i * $i;
        }
        $dp = array_fill(0,$n + 1, PHP_INT_MAX);
        $dp[0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $max_index && $square_arr[$j] <= $i; $j++) {
                $dp[$i] = min($dp[$i], $dp[$i - $square_arr[$j]] + 1);
            }
        }
        return $dp[$n];
    }
}