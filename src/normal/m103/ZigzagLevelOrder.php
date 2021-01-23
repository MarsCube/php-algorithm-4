<?php


namespace Algorithm\normal\m103;


use SplQueue;

/**
 * 给定一个二叉树，返回其节点值的锯齿形层序遍历。（即先从左往右，再从右往左进行下一层遍历，以此类推，层与层之间交替进行）。
 * 例如：
 * 给定二叉树 [3,9,20,null,null,15,7]
 * 返回锯齿形层序遍历如下：
 * [
 *  [3],
 *  [20,9],
 *  [15,7]
 * ]
 * Class ZigzagLevelOrder
 * @package Algorithm\normal\m103
 */
class ZigzagLevelOrder
{
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    public static function handle(TreeNode $root): array
    {
        // 存放节点的队列
        $node_queue = new SplQueue();
        $direct = true; // true 从左往右， false 从右往左
        $index = 0;
        $result = [];
        if (!$root) {
            return $result;
        }
        $node_queue->enqueue($root);
        while (!$node_queue->isEmpty()) {
            $result[$index] = [];
            // 获取队列当前长度
            $length = $node_queue->count();
            for ($i = 0; $i < $length; $i++) {
                $node = $node_queue->dequeue();
                self::pushToResult($result, $index, $direct, $node);
                if ($node->left) {
                    $node_queue->enqueue($node->left);
                }
                if ($node->right) {
                    $node_queue->enqueue($node->right);
                }
            }
            // 换方向
            $direct = !$direct;
            $index++;
        }
        return $result;
    }

    /**
     * 向结果集中添加元素
     * @param Integer[][] $result
     * @param Integer $index
     * @param bool $direct
     * @param TreeNode $node
     */
    private static function pushToResult(array &$result, int $index, bool $direct, TreeNode &$node)
    {
        if ($direct) {
            array_push($result[$index], $node->val);
        } else {
            array_unshift($result[$index], $node->val);
        }
    }
}