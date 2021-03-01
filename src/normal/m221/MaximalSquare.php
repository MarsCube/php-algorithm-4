<?php


namespace Algorithm\normal\m221;

/**
 * 最大正方形
 *
 * 在一个由 '0' 和 '1' 组成的二维矩阵内，找到只包含 '1' 的最大正方形，并返回其面积。
 *
 * Class MaximalSquare
 * @package Algorithm\normal\m221
 */
class MaximalSquare
{
    /**
     * 动态规划
     *
     * @param String[][] $matrix
     * @return Integer
     */
    public static function handle(array $matrix): int
    {
        $row_length = count($matrix);
        $col_length = count($matrix[0]);

        $dp = array_fill(0, $row_length + 1, array_fill(0, $col_length + 1, 0));
        $result = 0;
        for ($i = 1; $i <= $row_length; $i++) {
            for ($j = 1; $j <= $col_length; $j++) {
                if ($matrix[$i - 1][$j - 1] == 1) {
                    $dp[$i][$j] = min($dp[$i - 1][$j - 1], $dp[$i - 1][$j], $dp[$i][$j - 1]) + 1;
                    $result = max($result, $dp[$i][$j]);
                }
            }
        }
        return $result * $result;
    }
}