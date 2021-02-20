<?php


namespace Algorithm\normal\m230;

use SplStack;

/**
 * 二叉搜索树中第K小的元素
 *
 * 给定一个二叉搜索树的根节点 root ，和一个整数 k ，请你设计一个算法查找其中第 k 个最小元素（从 1 开始计数）。
 *
 * Class KthSmallest
 * @package Algorithm\normal\m230
 */
class KthSmallest
{
    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    public static function handle(TreeNode $root, int $k): int
    {
        $stack = new SplStack();
        while ($root || !$stack->isEmpty()) {
            if ($root) {
                $stack->push($root);
                $root = $root->left;
            } else {
                $root = $stack->pop();
                if (--$k == 0) {
                    return $root->val;
                }
                $root = $root->right;
            }
        }
        return 0;
    }
}