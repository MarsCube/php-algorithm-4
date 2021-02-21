<?php


namespace Algorithm\normal\m74;

/**
 * 搜索二维矩阵
 *
 * 编写一个高效的算法来判断 m x n 矩阵中，是否存在一个目标值。该矩阵具有如下特性：
 *
 * 每行中的整数从左到右按升序排列。
 * 每行的第一个整数大于前一行的最后一个整数。
 *
 * Class SearchMatrix
 * @package Algorithm\normal\m74
 */
class SearchMatrix
{
    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    public static function handle(array $matrix, int $target): bool
    {
        $row_count = count($matrix);
        $col_count = count($matrix[0]);

        // 二分法
        $left = 0;
        $right = $row_count * $col_count - 1;
        while ($left <= $right) {
            $middle = intdiv($left + $right, 2);
            $row = intdiv($middle, $col_count);
            $col = $middle % $col_count;
            if ($matrix[$row][$col] == $target) {
                return true;
            } elseif ($matrix[$row][$col] < $target) {
                $left = $middle + 1;
            } else {
                $right = $middle - 1;
            }
        }
        return false;
    }
}