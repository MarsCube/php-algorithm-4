<?php


namespace Algorithm\normal;

/**
 * 最长回文子串
 *
 * 给你一个字符串 s，找到 s 中最长的回文子串。
 *
 * Class LongestPalindrome
 * @package Algorithm\normal
 */
class LongestPalindrome
{
    private static $max = 0;

    private static $index = 0;

    /**
     * @param String $s
     * @return String
     */
    public static function handle(string $s): string
    {
        for ($i = 0; $i < strlen($s); $i++) {
            // 分两种情况，奇数 | 偶数
            self::palindromeLen($s, $i, $i);
            self::palindromeLen($s, $i, $i + 1);
        }
        return substr($s, self::$index, self::$max);
    }

    private static function palindromeLen(&$s, $left, $right)
    {
        while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
            $left--;
            $right++;
        }
        $length = $right - $left - 1;
        if (self::$max < $length) {
            self::$max = $length;
            self::$index = $left + 1;
        }
    }
}