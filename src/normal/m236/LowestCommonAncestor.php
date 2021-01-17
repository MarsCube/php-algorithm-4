<?php


namespace Algorithm\normal\m236;

/**
 * 二叉树的最近公共祖先
 *
 * 给定一个二叉树, 找到该树中两个指定节点的最近公共祖先。
 *
 * Class LowestCommonAncestor
 * @package Algorithm\normal\m236
 */
class LowestCommonAncestor
{
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode | boolean
     */
    function handle(TreeNode $root, TreeNode $p, TreeNode $q): TreeNode
    {
        if ($root == null) {
            return false;
        }
        if ($root === $p || $root === $q) {
            return $root;
        }
        $l_res = $this->handle($root->left, $p, $q);
        $r_res = $this->handle($root->right, $p, $q);
        // 两边各有一个
        if ($l_res && $r_res) {
            return $root;
        }
        // 两边都没有
        if (!$l_res && !$r_res) {
            return false;
        }
        return $l_res ? $l_res : $r_res;
    }
}