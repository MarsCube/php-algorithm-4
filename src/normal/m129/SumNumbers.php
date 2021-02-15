<?php


namespace Algorithm\normal\m129;

/**
 * 求根到叶子节点数字之和
 *
 * 给定一个二叉树，它的每个结点都存放一个  0-9  的数字，每条从根到叶子节点的路径都代表一个数字。
 *
 * 例如，从根到叶子节点路径 1->2->3 代表数字 123。
 *
 * 计算从根到叶子节点生成的所有数字之和。
 *
 * 说明:  叶子节点是指没有子节点的节点。
 *
 * Class SumNumbers
 * @package Algorithm\normal\m129
 */
class SumNumbers
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public static function handle(TreeNode $root): int
    {
        return self::helper($root, 0);
    }

    /**
     * @param TreeNode|null $root
     * @param int $base
     * @return int
     */
    private static function helper($root, int $base)
    {
        // 左边的叶子节点和 + 右边的叶子结点和
        if (!$root) {
            return 0;
        }
        $base = $base * 10 + $root->val;
        if ($root->left == null && $root->right == null) {
            return $base;
        }
        return self::helper($root->left, $base) + self::helper($root->right, $base);
    }
}