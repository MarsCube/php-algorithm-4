<?php


namespace Algorithm\normal\m48;

/**
 * 旋转图像
 *
 * 给定一个 n × n 的二维矩阵 matrix 表示一个图像。请你将图像顺时针旋转 90 度。
 * 你必须在 原地 旋转图像，这意味着你需要直接修改输入的二维矩阵。请不要 使用另一个矩阵来旋转图像。
 *
 * Class Rotate
 * @package Algorithm\normal\m48
 */
class Rotate
{
    /**
     * @param Integer[][] $matrix
     */
    public static function handle(array &$matrix)
    {
        $n = count($matrix);
        // 计算遍历的圈数
        $loop_row_circle = intdiv($n, 2);
        for ($i = 0; $i < $loop_row_circle; $i++) {
            // 开始走的列
            $start = $i;
            // 结束走的列
            $end = $n - 1 - $i;
            // 每一圈要走的步数
            $step = $end - $start;
            for ($j = $start; $j < $end; $j++) {
                $temp = $matrix[$i][$j];
                // 上到右
                $row = $start + ($step - ($end - $j));
                $col = $end;
                self::swap($temp, $matrix[$row][$col]);

                // 右到下
                $col = $end - ($step - ($end - $row));
                $row = $end;
                self::swap($temp, $matrix[$row][$col]);

                // 下到左
                $row = $end - ($step - ($col - $start));
                $col = $start;
                self::swap($temp, $matrix[$row][$col]);

                // 左到上
                $col = $start + $step - ($row - $start);
                $row = $start;
                $matrix[$row][$col] = $temp;
            }
        }
    }

    private static function swap(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
}