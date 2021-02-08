<?php


namespace Algorithm\normal\m62;

/**
 * 一个机器人位于一个 m x n网格的左上角 （起始点在下图中标记为 “Start” ）。
 *
 * 机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为 “Finish” ）。
 *
 * 问总共有多少条不同的路径？
 *
 * Class UniquePaths
 * @package Algorithm\normal\m62
 */
class UniquePaths
{
    private static $map;

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $m, int $n): int
    {
        return self::helper($m, $n);
    }

    /**
     * @param int $row
     * @param int $col
     * @return int
     */
    private static function helper(int $row, int $col): int
    {
        if ($row < 1 || $col < 1) {
            return 0;
        }
        if ($row == 1 || $col == 1) {
            return 1;
        }
        if (!isset(self::$map[$row . '-' . $col])) {
            self::$map[$row . '-' . $col] = self::helper($row - 1, $col) + self::helper($row, $col - 1);
        }
        return self::$map[$row . '-' . $col];
    }
}