<?php


namespace Algorithm\normal\m94;

use SplStack;

/**
 * 二叉树的中序遍历
 *
 * 给定一个二叉树的根节点 root ，返回它的 中序 遍历。
 *
 * Class InorderTraversal
 * @package Algorithm\normal\m94
 */
class InorderTraversal
{
    /**
     * 栈式遍历
     *
     * @param TreeNode $root
     * @return Integer[]
     */
    public static function handle(TreeNode $root): array
    {
        $result = [];
        $stack = new SplStack();
        while ($root || !$stack->isEmpty()) {
            if ($root) {
                $stack->push($root);
                $root = $root->left;
            } else {
                $root = $stack->pop();
                $result[] = $root->val;
                $root = $root->right;
            }
        }
        return $result;
    }
}