<?php


namespace Algorithm\normal\m200;

/**
 * 岛屿数量
 *
 * 给你一个由 '1'（陆地）和 '0'（水）组成的的二维网格，请你计算网格中岛屿的数量。
 * 岛屿总是被水包围，并且每座岛屿只能由水平方向和/或竖直方向上相邻的陆地连接形成。
 * 此外，你可以假设该网格的四条边均被水包围。
 *
 * Class NumIslands
 * @package Algorithm\normal\m200
 */
class NumIslands
{
    /**
     * @param String[][] $grid
     * @return Integer
     */
    public static function handle(array $grid): int
    {
        $row_max = count($grid);
        if ($row_max == 0) {
            return 0;
        }
        $result = 0;
        $col_max = count($grid[0]);
        for ($i = 0; $i < $row_max; $i++) {
            for ($j = 0; $j < $col_max; $j++) {
                if ($grid[$i][$j] == 1) {
                    $result++;
                    self::dfs($grid, $i, $j, $row_max - 1, $col_max - 1);
                }
            }
        }
        return $result;
    }

    /**
     * 深度优先遍历
     *
     * @param array $grid
     * @param int $row_index
     * @param int $col_index
     * @param int $row_max
     * @param int $col_max
     */
    private static function dfs(array &$grid, int $row_index, int $col_index, int $row_max, int $col_max)
    {
        if ($row_index < 0 || $row_index > $row_max || $col_index < 0 || $col_index > $col_max || $grid[$row_index][$col_index] == 0) {
            return;
        }
        $grid[$row_index][$col_index] = 0;
        self::dfs($grid, $row_index - 1, $col_index, $row_max, $col_max);
        self::dfs($grid, $row_index, $col_index + 1, $row_max, $col_max);
        self::dfs($grid, $row_index + 1, $col_index, $row_max, $col_max);
        self::dfs($grid, $row_index, $col_index - 1, $row_max, $col_max);
    }
}