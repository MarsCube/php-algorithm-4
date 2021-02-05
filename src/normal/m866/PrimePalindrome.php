<?php


namespace Algorithm\normal\m866;

/**
 * 回文素数
 *
 * 求出大于或等于N的最小回文素数。
 * 回顾一下，如果一个数大于 1，且其因数只有 1 和它自身，那么这个数是素数。
 * 例如，2，3，5，7，11 以及13 是素数。
 * 回顾一下，如果一个数从左往右读与从右往左读是一样的，那么这个数是回文数。
 * 例如，12321 是回文数。
 *
 * Class PrimePalindrome
 * @package Algorithm\normal\m866
 */
class PrimePalindrome
{
    /**
     * @param Integer $N
     * @return Integer
     */
    public static function handle(int $N): int
    {
        $n = self::nextPalindromeNum($N);
        while (!self::isPrime($n)) {
            $n++;
            $n = self::nextPalindromeNum($n);
        }
        return $n;
    }

    /**
     * 判断素数
     *
     * @param int $n
     * @return bool
     */
    private static function isPrime(int $n): bool
    {
        if ($n == 1) {
            return false;
        }
        $max = sqrt($n);
        for ($i = 2; $i <= $max; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * 获取大于等于n的下一个回文数
     *
     * @param int $n
     * @return int
     */
    private static function nextPalindromeNum(int $n): int
    {
        $n = (string)$n;
        $result = self::reserveAfter($n);
        // 判断大小
        if ((int)$result >= $n) {
            return (int)$result;
        }
        $mid = ceil(strlen($n) / 2);
        $num = (int)substr($result, 0, $mid) + 1;
        $num = (string)$num;
        for ($i = 0; $i < $mid; $i++) {
            $result[$i] = $num[$i];
        }
        return (int)self::reserveAfter($result);
    }

    /**
     * 翻转出回文
     *
     * @param string $n
     * @return string
     */
    private static function reserveAfter(string $n): string
    {
        $length = strlen($n);
        $mid = intdiv($length, 2);
        for ($i = 0; $i < $mid; $i++) {
            $n[$length - $i - 1] = $n[$i];
        }
        return $n;
    }
}