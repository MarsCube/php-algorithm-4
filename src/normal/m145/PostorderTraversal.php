<?php


namespace Algorithm\normal\m145;

use SplStack;

/**
 * 二叉树的后序遍历
 *
 * 给定一个二叉树，返回它的 后序 遍历。
 *
 * 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
 *
 * Class PostorderTraversal
 * @package Algorithm\normal\m145
 */
class PostorderTraversal
{
    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public static function handle(TreeNode $root): array
    {
        if (!$root) {
            return [];
        }
        $result = [];
        $stack = new SplStack();
        $pre = null;
        while ($root || !$stack->isEmpty()) {
            while ($root) {
                $stack->push($root);
                $root = $root->left;
            }
            $node = $stack->top();
            if (!$node->right || $node->rigth == $pre) {
                $stack->pop();
                // 避免重复搞右
                array_push($result, $node->val);
                $pre = $node;
                // 这里是因为左边搞过了，让直接搞右
                $root = null;
            } else {
                $root = $node->right;
            }
        }
        return $result;
    }
}