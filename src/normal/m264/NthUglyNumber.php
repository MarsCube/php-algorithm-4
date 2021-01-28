<?php


namespace Algorithm\normal\m264;

/**
 * 丑数 II
 *
 * 编写一个程序，找出第 n 个丑数。
 * 丑数就是质因数只包含 2, 3, 5 的正整数。
 *
 * Class NthUglyNumber
 * @package Algorithm\normal\m264
 */
class NthUglyNumber
{
    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        $dp = array_fill(0, $n, 0);
        $dp[0] = 1;
        $p_2 = $p_3 = $p_5 = 0;
        for ($i = 1; $i < $n; $i++) {
            $dp[$i] = min($dp[$p_2] * 2, $dp[$p_3] * 3, $dp[$p_5] * 5);
            if ($dp[$i] == $dp[$p_2] * 2) {
                $p_2++;
            }
            if ($dp[$i] == $dp[$p_3] * 3) {
                $p_3++;
            }
            if ($dp[$i] == $dp[$p_5] * 5) {
                $p_5++;
            }
        }
        return $dp[$n - 1];
    }
}