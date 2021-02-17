<?php


namespace Algorithm\normal\m386;

/**
 * 字典序排数
 *
 * 给定一个整数 n, 返回从 1 到 n 的字典顺序。
 *
 * 例如，给定 n =1 3，返回 [1,10,11,12,13,2,3,4,5,6,7,8,9] 。
 *
 * 请尽可能的优化算法的时间复杂度和空间复杂度。 输入的数据 n 小于等于 5,000,000。
 *
 * Class LexicalOrder
 * @package Algorithm\normal\m386
 */
class LexicalOrder
{
    private static $result = [];

    /**
     * 桶的概念
     *
     * @param Integer $n
     * @return Integer[]
     */
    public static function handle(int $n): array
    {
        self::$result = [];
        $length = min(9, $n);
        for ($i = 1; $i <= $length; $i++) {
            self::$result[] = $i;
            self::dfs($i * 10, $n);
        }
        return self::$result;
    }

    /**
     * 深度优先遍历
     *
     * @param int $base
     * @param int $n
     */
    private static function dfs(int $base, int $n)
    {
        if ($base > $n) {
            return;
        }
        $length = min($base + 9, $n);
        for ($i = $base; $i <= $length; $i++) {
            self::$result[] = $i;
            self::dfs($i * 10, $n);
        }
    }
}