<?php


namespace Algorithm\normal\m95;

/**
 * 不同的二叉搜索树 II
 *
 * 给定一个整数 n，生成所有由 1 ... n 为节点所组成的 二叉搜索树 。
 *
 * 输入：3
 * 输出：
 * [
 *  [1,null,3,2],
 *  [3,2,null,1],
 *  [3,1,null,null,2],
 *  [2,1,3],
 *  [1,null,2,null,3]
 *]
 *
 * Class GenerateTrees
 * @package Algorithm\normal\m95
 */
class GenerateTrees
{
    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    public static function handle(int $n): array
    {
        if ($n == 0) {
            return [];
        }
        return self::generateTreesByRange(1, $n);
    }

    /**
     * @param Integer $start
     * @param Integer $end
     * @return TreeNode[]
     */
    public static function generateTreesByRange(int $start, int $end): array
    {
        if ($start > $end) {
            return [null];
        }
        $result = [];
        for ($i = $start; $i <= $end; $i++) {
            $left_list = self::generateTreesByRange($start, $i - 1);
            $right_list = self::generateTreesByRange($i + 1, $end);
            foreach ($left_list as $left) {
                foreach ($right_list as $right) {
                    $item = new TreeNode($i);
                    $item->left = $left;
                    $item->right = $right;
                    $result[] = $item;
                }
            }
        }
        return $result;
    }
}