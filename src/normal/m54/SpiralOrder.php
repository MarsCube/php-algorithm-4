<?php


namespace Algorithm\normal\m54;

/**
 * 给定一个包含 m855 x n 个元素的矩阵（m855 行, n 列），请按照顺时针螺旋顺序，返回矩阵中的所有元素。
 *
 * 输入:
 * [
 *  [ 1, 2, 3 ],
 *  [ 4, 5, 6 ],
 *  [ 7, 8, 9 ]
 * ]
 * 输出: [1,2,3,6,9,8,7,4,5]
 *
 * Class SpiralOrder
 * @package Algorithm\normal\m54
 */
class SpiralOrder
{
    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    public static function handle(array $matrix): array
    {
        $result = [];
        $up_stop = $left_stop = 0;
        $down_stop = count($matrix) - 1;
        if ($down_stop < 0) {
            return $result;
        }
        $right_stop = count($matrix[0]) - 1;
        // 方向 0：向右，1：向下，2：向左，3向上
        $direct = 0;
        while ($left_stop <= $right_stop && $up_stop <= $down_stop) {
            $direct = $direct % 4;
            switch ($direct) {
                case 0:
                    for ($i = $left_stop; $i <= $right_stop; $i++) {
                        $result[] = $matrix[$up_stop][$i];
                    }
                    $up_stop++;
                    $direct++;
                    break;
                case 1:
                    for ($i = $up_stop; $i <= $down_stop; $i++) {
                        $result[] = $matrix[$i][$right_stop];
                    }
                    $right_stop--;
                    $direct++;
                    break;
                case 2:
                    for ($i = $right_stop; $i >= $left_stop; $i--) {
                        $result[] = $matrix[$down_stop][$i];
                    }
                    $down_stop--;
                    $direct++;
                    break;
                case 3:
                    for ($i = $down_stop; $i >= $up_stop; $i--) {
                        $result[] = $matrix[$i][$left_stop];
                    }
                    $left_stop++;
                    $direct++;
                    break;
                default:
                    break;
            }
        }
        return $result;
    }
}