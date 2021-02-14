<?php


namespace Algorithm\normal\m289;

/**
 * 生命游戏
 *
 * 给定一个包含 m × n 个格子的面板，每一个格子都可以看成是一个细胞。
 * 每个细胞都具有一个初始状态：1 即为活细胞（live），或 0 即为死细胞（dead）。
 * 每个细胞与其八个相邻位置（水平，垂直，对角线）的细胞都遵循以下四条生存定律：
 *
 *      如果活细胞周围八个位置的活细胞数少于两个，则该位置活细胞死亡；
 *      如果活细胞周围八个位置有两个或三个活细胞，则该位置活细胞仍然存活；
 *      如果活细胞周围八个位置有超过三个活细胞，则该位置活细胞死亡；
 *      如果死细胞周围正好有三个活细胞，则该位置死细胞复活；
 * 下一个状态是通过将上述规则同时应用于当前状态下的每个细胞所形成的，其中细胞的出生和死亡是同时发生的。
 * 给你 m x n 网格面板 board 的当前状态，返回下一个状态。
 *
 * Class GameOfLife
 * @package Algorithm\normal\m289
 */
class GameOfLife
{
    /**
     * @param Integer[][] $board
     */
    public static function handle(array &$board)
    {
        // 周边遍历辅助数组
        $direct_arr = [[-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1]];

        // 增加状态来达到判断效果
        // 0 死亡 1 存活 2 原来活着，现在死了 3 原来死了，现在活着
        $row_count = count($board);
        $col_count = count($board[0]);

        for ($i = 0; $i < $row_count; $i++) {
            for ($j = 0; $j < $col_count; $j++) {
                // 存活个数
                $live_count = 0;
                foreach ($direct_arr as $item) {
                    if (isset($board[$i + $item[0]][$j + $item[1]]) && in_array($board[$i + $item[0]][$j + $item[1]], [1, 2])) {
                        $live_count++;
                    }
                }
                // 条件1、2、3
                if (($live_count < 2 || $live_count > 3) && $board[$i][$j] == 1) {
                    $board[$i][$j] = 2;
                } elseif ($live_count == 3 && $board[$i][$j] == 0) {
                    $board[$i][$j] = 3;
                }
            }
        }
        // 状态恢复
        for ($i = 0; $i < $row_count; $i++) {
            for ($j = 0; $j < $col_count; $j++) {
                if ($board[$i][$j] == 2) {
                    $board[$i][$j] = 0;
                } elseif ($board[$i][$j] == 3) {
                    $board[$i][$j] = 1;
                }
            }
        }
    }
}