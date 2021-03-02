<?php


namespace Algorithm\normal\s617;

/**
 * 合并二叉树
 *
 * Class MergeTrees
 * @package Algorithm\normal\s617
 */
class MergeTrees
{
    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    public static function handle($root1, $root2)
    {
        if (!$root1) {
            return $root2;
        }
        if (!$root2) {
            return $root1;
        }
        $node = new TreeNode($root1->val + $root1->val);
        $node->left = self::handle($root1->left, $root2->left);
        $node->right = self::handle($root1->right, $root2->right);
        return $node;
    }
}