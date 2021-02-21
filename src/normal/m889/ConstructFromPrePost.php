<?php


namespace Algorithm\normal\m889;

/**
 * 根据前序和后序遍历构造二叉树
 *
 * 返回与给定的前序和后序遍历匹配的任何二叉树。
 * pre 和 post 遍历中的值是不同的正整数。
 *
 * Class ConstructFromPrePost
 * @package Algorithm\normal\m889
 */
class ConstructFromPrePost
{
    /**
     * @param Integer[] $pre
     * @param Integer[] $post
     * @return TreeNode
     */
    public static function handle(array $pre, array $post): TreeNode
    {
        return self::helper($pre, 0, $post, 0, count($pre));
    }

    /**
     * @param Integer[] $pre
     * @param Integer $pre_start
     * @param Integer[] $post
     * @param Integer $post_start
     * @param Integer $length
     * @return TreeNode|null
     */
    private static function helper(array &$pre, int $pre_start, array &$post, int $post_start, int $length)
    {
        if ($length <= 0) {
            return null;
        }
        $root = new TreeNode($pre[$pre_start]);
        if ($length == 1) {
            return $root;
        }
        // 找到左子树的根节点
        $left_root = $pre_start + 1;
        // 左子树长度
        $left_length = 1;
        while ($left_length < $length && $post[$post_start + $left_length - 1] != $pre[$left_root]) {
            $left_length++;
        }
        $root->left = self::helper($pre, $left_root, $post, $post_start, $left_length);
        $root->right = self::helper($pre, $left_root + $left_length, $post, $post_start + $left_length, $length - 1 - $left_length);
        return $root;
    }


}