<?php


namespace Algorithm\normal\h212;

/**
 * 单词搜索 II
 * 给定一个 m x n 二维字符网格 board 和一个单词（字符串）列表 words，找出所有同时在二维网格和字典中出现的单词。
 *
 * 单词必须按照字母顺序，通过 相邻的单元格 内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。
 * 同一个单元格内的字母在一个单词中不允许被重复使用。
 *
 * Class FindWords
 * @package Algorithm\normal\h212
 */
class FindWords
{
    private static $result;

    private static $directs;

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    public static function handle(array $board, array $words): array
    {
        // 使用前缀树
        $tree = new Trie();
        foreach ($words as $word) {
            $tree->insert($word);
        }
        $root = $tree->root();

        self::$result = [];
        // 方向辅助
        self::$directs = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        $row_count = count($board);
        $col_count = count($board[0]);

        for ($i = 0; $i < $row_count; $i++) {
            for ($j = 0; $j < $col_count; $j++) {
                self::dfs($i, $j, $board, $root, '');
            }
        }
        return self::$result;
    }

    private static function dfs($row, $col, &$board, Node &$root, $temp)
    {
        $char = $board[$row][$col];
        if (!isset($root->next[$char])) {
            return;
        }
        // 找到字符串
        $temp .= $char;
        // 找过的就不找了
        $board[$row][$col] = '#';

        $next = $root->next[$char];
        if ($next->is_string) {
            self::$result[] = $temp;
            // 只找一遍
            $next->is_string = false;
        }
        // dfs
        foreach (self::$directs as $direct) {
            $new_row = $row + $direct[0];
            $new_col = $col + $direct[1];
            if (isset($board[$new_row][$new_col])) {
                self::dfs($new_row, $new_col, $board, $next, $temp);
            }
        }
        // 恢复
        $board[$row][$col] = $char;
    }
}