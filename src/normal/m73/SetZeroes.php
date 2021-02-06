<?php


namespace Algorithm\normal\m73;

/**
 * 矩阵置零
 *
 * 给定一个 m855 x n 的矩阵，如果一个元素为 0，则将其所在行和列的所有元素都设为 0。请使用原地算法。
 * 
 * 输入:
 * [
 *  [1,1,1],
 *  [1,0,1],
 *  [1,1,1]
 * ]
 * 输出:
 * [
 *  [1,0,1],
 *  [0,0,0],
 *  [1,0,1]
 * ]
 *
 * Class SetZeroes
 * @package Algorithm\normal\m73
 */
class SetZeroes
{
    /**
     * @param Integer[][] $matrix
     * @return void
     */
    public static function handle(array &$matrix) {
        // 可以把矩阵的第一行 和 第一列作为标志位
        // 但第一行或者第一列是否需要置零有待商榷
        // 所以先确认第一行 和 第一列是否需要置为0
        if (count($matrix) == 0) {
            return;
        }
        // 行数
        $row_num = count($matrix);
        if ($row_num == 0) {
            return;
        }
        // 列数
        $col_num = count($matrix[0]);
        if ($col_num == 0) {
            return;
        }
        // 确认第一行是否为0
        $row_zero_flag = false;
        for ($i = 0; $i < $col_num; $i++) {
            if ($matrix[0][$i] == 0) {
                $row_zero_flag = true;
                break;
            }
        }
        // 确认第一列是否为0
        $col_zero_flag = false;
        for ($i = 0; $i < $row_num; $i++) {
            if ($matrix[$i][0] == 0) {
                $col_zero_flag = true;
                break;
            }
        }
        // 遍历除第一行第一列之外的值，更新标志位
        for ($i = 1; $i < $row_num; $i++) {
            for ($j = 1; $j < $col_num; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $matrix[$i][0] = 0;
                    $matrix[0][$j] = 0;
                }
            }
        }
        // 遍历除第一行第一列之外的值，根据标志位更新值
        for ($i = 1; $i < $row_num; $i++) {
            for ($j = 1; $j < $col_num; $j++) {
                if ($matrix[$i][0] == 0 ||  $matrix[0][$j] == 0) {
                    $matrix[$i][$j] = 0;
                }
            }
        }
        // 根据$row_zero_flag更新第一行数据
        if ($row_zero_flag) {
            for ($i = 0; $i < $col_num; $i++) {
                $matrix[0][$i] = 0;
            }
        }
        // 根据$col_zero_flag更新第一列数据
        if ($col_zero_flag) {
            for ($i = 0; $i < $row_num; $i++) {
                $matrix[$i][0] = 0;
            }
        }
    }
}