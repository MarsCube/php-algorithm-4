<?php


namespace Algorithm\normal\m304;

/**
 * 二维区域和检索 - 矩阵不可变
 *
 * Class NumMatrix
 * @package Algorithm\normal\m304
 */
class NumMatrix
{
    private $map;

    /**
     * @param Integer[][] $matrix
     */
    function __construct(array $matrix)
    {
        $row_length = count($matrix);
        $col_length = count($matrix[0]);
        $this->map = array_fill(0, $row_length + 1, array_fill(0, $col_length + 1, 0));
        for ($i = 1; $i <= $row_length; $i++) {
            for ($j = 1; $j <= $col_length; $j++) {
                $this->map[$i][$j] = $matrix[$i - 1][$j - 1]
                    + $this->map[$i - 1][$j]
                    + $this->map[$i][$j - 1]
                    - $this->map[$i - 1][$j - 1];
            }
        }
    }

    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @return Integer
     */
    function sumRegion(int $row1, int $col1, int $row2, int $col2): int
    {
        return $this->map[$row2 + 1][$col2 + 1]
            + $this->map[$row1][$col1]
            - $this->map[$row1][$col2 + 1]
            - $this->map[$row2 + 1][$col1];
    }
}