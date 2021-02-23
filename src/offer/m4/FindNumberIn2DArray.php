<?php


namespace Algorithm\offer\m4;

/**
 * 二维数组中的查找
 *
 * 在一个 n * m 的二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。
 * 请完成一个高效的函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
 *
 * [
 * [1,   4,  7, 11, 15],
 * [2,   5,  8, 12, 19],
 * [3,   6,  9, 16, 22],
 * [10, 13, 14, 17, 24],
 * [18, 21, 23, 26, 30]
 * ]
 *
 * Class FindNumberIn2DArray
 * @package Algorithm\offer\m4
 */
class FindNumberIn2DArray
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
        $row_start = $col_start = 0;
        $row_end = $row_count - 1;
        $col_end = $col_count - 1;
        while (isset($matrix[$row_start][$col_end])) {
            $col_end = self::binarySearchGte($matrix, $row_start, $col_start, $col_end, $target);
            if (isset($matrix[$row_start][$col_end]) && $matrix[$row_start][$col_end] == $target) {
                return true;
            }
            if (isset($matrix[$row_start][$col_end])) {
                $row_start++;
                $row_start = self::binarySearchLte($matrix, $col_end, $row_start, $row_end, $target);
                echo $row_start . '|' . $row_end . '|' . $col_start . '|' . $col_end . PHP_EOL;
                if (isset($matrix[$row_start][$col_end]) && $matrix[$row_start][$col_end] == $target) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * 二分查找小于等于
     * @param Integer[][] $matrix
     * @param Integer $row_index
     * @param Integer $start
     * @param Integer $end
     * @param Integer $target
     * @return int
     */
    private static function binarySearchGte(array &$matrix, int $row_index, int $start, int $end, int $target): int
    {
        $left = $start;
        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($matrix[$row_index][$middle] == $target) {
                return $middle;
            } elseif ($matrix[$row_index][$middle] < $target) {
                $start = $middle + 1;
            } else {
                $end = $middle - 1;
            }
        }
        if ($end < $left) {
            return -1;
        } elseif ($matrix[$row_index][$end] > $target) {
            return $end - 1;
        } else {
            return $end;
        }
    }

    /**
     * 二分查找大于等于
     * @param Integer[][] $matrix
     * @param Integer $col_index
     * @param Integer $start
     * @param Integer $end
     * @param Integer $target
     * @return int
     */
    private static function binarySearchLte(array &$matrix, int $col_index, int $start, int $end, int $target): int
    {
        $length = $end;
        while ($start <= $end) {
            $middle = intdiv($start + $end, 2);
            if ($matrix[$middle][$col_index] == $target) {
                return $middle;
            } elseif ($matrix[$middle][$col_index] < $target) {
                $start = $middle + 1;
            } else {
                $end = $middle - 1;
            }
        }
        if ($start > $length) {
            return -1;
        } elseif ($matrix[$start][$col_index] < $target) {
            return $start + 1;
        } else {
            return $start;
        }
    }
}