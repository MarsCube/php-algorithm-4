<?php


namespace Algorithm\normal\m994;

use SplQueue;

/**
 * 腐烂的橘子
 *
 * 在给定的网格中，每个单元格可以有以下三个值之一：
 *
 * 值 0 代表空单元格；
 * 值 1 代表新鲜橘子；
 * 值 2 代表腐烂的橘子。
 * 每分钟，任何与腐烂的橘子（在 4 个正方向上）相邻的新鲜橘子都会腐烂。
 *
 * 返回直到单元格中没有新鲜橘子为止所必须经过的最小分钟数。如果不可能，返回 -1。
 *
 * Class OrangesRotting
 * @package Algorithm\normal\m994
 */
class OrangesRotting
{
    /**
     * bfs 解法，层数即为分钟数
     *
     * @param Integer[][] $grid
     * @return Integer
     */
    public static function handle(array $grid): int
    {
        // 方向辅助数组 上下左右
        $direct_helper = [[1, 0], [-1, 0], [0, 1], [0, -1]];

        $row_count = count($grid);
        $col_count = count($grid[0]);

        // 队列中放入所有已腐烂的橘子
        $queue = new SplQueue();
        // 统计正常橘子个数
        $count = 0;
        for ($i = 0; $i < $row_count; $i++) {
            for ($j = 0; $j < $col_count; $j++) {
                if ($grid[$i][$j] == 1) {
                    $count++;
                } elseif ($grid[$i][$j] == 2) {
                    $queue->enqueue([$i, $j]);
                }
            }
        }
        if ($count == 0) {
            return 0;
        }

        $result = -1;
        // bfs遍历
        while (!$queue->isEmpty()) {
            $length = $queue->count();
            for ($i = 0; $i < $length; $i++) {
                $node = $queue->dequeue();
                $row = $node[0];
                $col = $node[1];
                for ($j = 0; $j < 4; $j++) {
                    $next_row = $row + $direct_helper[$j][0];
                    $next_col = $col + $direct_helper[$j][1];
                    if (isset($grid[$next_row][$next_col]) && $grid[$next_row][$next_col] == 1) {
                        $count--;
                        $grid[$next_row][$next_col] = 2;
                        $queue->enqueue([$next_row, $next_col]);
                    }
                }
            }
            $result++;
        }
        return $count > 0 ? -1 : $result;
    }
}