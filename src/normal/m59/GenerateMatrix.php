<?php


namespace Algorithm\normal\m59;

/**
 * 给定一个正整数 n，生成一个包含 1 到 n2 所有元素，且元素按顺时针顺序螺旋排列的正方形矩阵。
 *
 * 输入: 3
 * 输出:[
 *  [ 1, 2, 3 ],
 *  [ 8, 9, 4 ],
 *  [ 7, 6, 5 ]
 * ]
 *
 * Class GenerateMatrix
 * @package Algorithm\normal\m59
 */
class GenerateMatrix
{
    /**
     * @param Integer $n
     * @return Integer[][]
     */
    public static function handle(int $n): array
    {
        $result = array_fill(0, $n, array_fill(0, $n, null));
        $up_stop = $left_stop = 0;
        $down_stop = $right_stop = $n - 1;
        // 方向 0：向右，1：向下，2：向左，3向上
        $direct = 0;
        $index = 1;
        while ($left_stop <= $right_stop && $up_stop <= $down_stop) {
            $direct = $direct % 4;
            switch ($direct) {
                case 0:
                    for ($i = $left_stop; $i <= $right_stop; $i++) {
                        $result[$up_stop][$i] = $index++;
                    }
                    $up_stop++;
                    $direct++;
                    break;
                case 1:
                    for ($i = $up_stop; $i <= $down_stop; $i++) {
                        $result[$i][$right_stop] = $index++;
                    }
                    $right_stop--;
                    $direct++;
                    break;
                case 2:
                    for ($i = $right_stop; $i >= $left_stop; $i--) {
                        $result[$down_stop][$i] = $index++;
                    }
                    $down_stop--;
                    $direct++;
                    break;
                case 3:
                    for ($i = $down_stop; $i >= $up_stop; $i--) {
                        $result[$i][$left_stop] = $index++;
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