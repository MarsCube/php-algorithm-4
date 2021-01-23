<?php


namespace Algorithm\normal\m279;

use phpDocumentor\Reflection\Types\Integer;

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
     * @var Integer[]
     */
    private static $square_arr = [];

    private static $min_count_map = [];

    /**
     * @param int $n
     * @return int
     */
    public static function handle(int $n): int
    {
        if ($n == 0) {
            return 0;
        }
        self::initSquareArr($n);
        for ($i = 1; $i <= $n; $i++) {
            if (self::check($n, $i)) {
                return $i;
            }
        }
        return $n;
    }

    private static function check(int $n, int $count): bool
    {
        if ($count == 0) {
            return false;
        }
        if (isset(self::$min_count_map[$n])) {
            return self::$min_count_map[$n] == $count;
        }
        $max_index = (int)sqrt($n);
        for ($i = $max_index; $i > 0; $i--) {
            if (self::check($n - self::$square_arr[$i], $count - 1)) {
                self::$min_count_map[$n] = $count;
                return true;
            }
        }
        return false;
    }

    private static function initSquareArr($n)
    {
        $max_index = (int)sqrt($n);
        self::$square_arr = array_fill(0, $max_index + 1, 0);
        for ($i = 1; $i <= $max_index; $i++) {
            self::$square_arr[$i] = $i * $i;
            self::$min_count_map[$i * $i] = 1;
        }
    }
}