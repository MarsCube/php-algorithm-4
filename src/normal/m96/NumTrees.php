<?php


namespace Algorithm\normal\m96;

/**
 * 不同的二叉搜索树
 *
 * 给定一个整数 n，求以 1 ... n 为节点组成的二叉搜索树有多少种？
 *
 * 输入: 3
 * 输出: 5
 *
 * Class NumTrees
 * @package Algorithm\normal\m96
 */
class NumTrees
{
    // 备忘录减少递归层数
    private static $map = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        // 求左边有 0 --- n-1 个节点的清况
        if ($n == 0) {
            return 1;
        }
        // 左边的种数 * 右边的种数
        if (!isset(self::$map[$n])) {
            $count = 0;
            for ($i = 0; $i < $n; $i++) {
                $count += self::handle($i) * self::handle($n - $i - 1);
            }
            self::$map[$n] = $count;
        }
        return self::$map[$n];
    }
}