<?php


namespace Algorithm\normal\m222;

use SplQueue;

/**
 * 完全二叉树的节点个数
 *
 * 给你一棵 完全二叉树 的根节点 root ，求出该树的节点个数。
 *
 * Class CountNodes
 * @package Algorithm\normal\m222
 */
class CountNodes
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public static function handle(TreeNode $root): int
    {
        if (!$root) {
            return 0;
        }
        // 层序遍历找子节点不满的第一个节点
        $queue = new SplQueue();
        $queue->push($root);
        $index = 0;
        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();
            $index++;
            if ($node->left) {
                $queue->enqueue($node->left);
            } else {
                return $index * 2 - 1;
            }
            if ($node->right) {
                $queue->enqueue($node->right);
            } else {
                return $index * 2;
            }
        }
        return 0;
    }
}