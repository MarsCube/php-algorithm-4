<?php


namespace Algorithm\normal\s867;

/**
 * 转置矩阵
 *
 * 给你一个二维整数数组 matrix， 返回 matrix 的 转置矩阵 。
 * 矩阵的 转置 是指将矩阵的主对角线翻转，交换矩阵的行索引与列索引。
 *
 * Class Transpose
 * @package Algorithm\normal\s867
 */
class Transpose
{
    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     */
    public static function handle(array $matrix): array
    {
        $result = [];
        foreach ($matrix as $row_index => $row) {
            foreach ($row as $col_index => $item) {
                $result[$col_index][$row_index] = $matrix[$row_index][$col_index];
            }
        }
        return $result;
    }
}