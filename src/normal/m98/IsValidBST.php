<?php


namespace Algorithm\normal\m98;

/**
 * 验证二叉搜索树
 *
 * Class IsValidBST
 * @package Algorithm\normal\m98
 */
class IsValidBST
{
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    public static function handle(TreeNode $root): bool
    {
        return self::checkBst($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    /**
     * @param TreeNode $root
     * @param Integer $min
     * @param Integer $max
     * @return bool
     */
    private static function checkBst(TreeNode $root, int $min, int $max): bool
    {
        if (!$root) {
            return true;
        }
        return self::checkRoot($root, $min, $max)
            && self::checkBst($root->left, $min, $root->val)
            && self::checkBst($root, $root->val, $max);
    }

    /**
     * @param TreeNode $root
     * @param Integer $min
     * @param Integer $max
     * @return bool
     */
    private static function checkRoot(TreeNode $root, int $min, int $max): bool
    {
        $left = $root->left ? $root->left->val : $min;
        $right = $root->right ? $root->right->val : $max;
        $val = $root->val;
        return $val > $min && $val > $left && $val < $max && $val < $right;
    }
}