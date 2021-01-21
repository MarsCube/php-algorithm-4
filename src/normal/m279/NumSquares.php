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
    private static $square_arr = [];

    private static $min_count_map = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        self::initSquareArr($n);
        return self::minCount($n);
    }

    /**
     * @param $n
     * @return int
     */
    private static function minCount($n): int
    {
        if ($n == 0) {
            return 0;
        }
        $result = PHP_INT_MAX;
        if (!isset(self::$min_count_map[$n])) {
            for ($i = 1; isset(self::$square_arr[$i]) && self::$square_arr[$i] <= $n; $i++) {
                $result = min(self::minCount($n - self::$square_arr[$i]) + 1, $result);
            }
            self::$min_count_map[$n] = $result;
        }
        return self::$min_count_map[$n];
    }

    private static function initSquareArr($n) {
        $max_index = (int)sqrt($n);
        self::$square_arr = array_fill(0,$max_index + 1, 0);
        for ($i = 1; $i <= $max_index; $i++) {
            self::$square_arr[$i] = $i * $i;
        }
    }
}