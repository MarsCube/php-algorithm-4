<?php


namespace Algorithm\normal\m105;

/**
 * 从前序与中序遍历序列构造二叉树
 *
 * 根据一棵树的前序遍历与中序遍历构造二叉树。
 * 注意:
 * 你可以假设树中没有重复的元素。
 *
 * Class BuildTree
 * @package Algorithm\normal\m105
 */
class BuildTree
{
    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return null|TreeNode
     */
    public static function handle(array $preorder, array $inorder)
    {
        if (empty($preorder)) {
            return null;
        }
        return self::build($preorder, 0, count($preorder) - 1, $inorder, 0, count($inorder) - 1);
    }

    /**
     * @param array $preorder
     * @param int $pre_start
     * @param int $pre_end
     * @param array $inorder
     * @param int $in_start
     * @param int $in_end
     * @return TreeNode|null
     */
    private static function build(array &$preorder,int $pre_start,int $pre_end, array &$inorder, int $in_start,int $in_end)
    {
        if ($pre_start > $pre_end) {
            return null;
        }
        $root_value = $preorder[$pre_start];
        $root = new TreeNode($root_value);
        // 先找左子树的长度
        $left_length = 0;
        for($i = $in_start; $i <= $in_end; $i++) {
            if ($inorder[$i] == $root_value) {
                break;
            }
            $left_length++;
        }
        $root->left = self::build($preorder, $pre_start + 1, $pre_start + $left_length, $inorder, $in_start, $in_start + $left_length - 1);
        $root->right = self::build($preorder, $pre_start + $left_length + 1, $pre_end, $inorder, $in_start + $left_length + 1, $in_end);
        return $root;
    }
}