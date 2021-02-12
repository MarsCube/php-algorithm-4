<?php


namespace Algorithm\normal\m973;

/**
 * 最接近原点的 K 个点
 *
 * 我们有一个由平面上的点组成的列表 points。需要从中找出 K 个距离原点 (0, 0) 最近的点。
 *
 * 你可以按任何顺序返回答案。除了点坐标的顺序之外，答案确保是唯一的。
 *
 * Class KClosest
 * @package Algorithm\normal\m973
 */
class KClosest
{
    /**
     * @param Integer[][] $points
     * @param Integer $K
     * @return Integer[][]
     */
    public static function handle(array $points, int $K): array
    {
        // 系统类 SplMaxHeap 无法实现，只能重写大顶堆了。
        $length = count($points);
        if ($length <= $K) {
            return $points;
        }

        $result = array_fill(0, $K, null);
        for ($i = 0; $i < $K; $i++) {
            $node = new Node();
            $node->key = $points[$i][0] * $points[$i][0] + $points[$i][1] * $points[$i][1];
            $node->value = $i;
            $result[$i] = $node;
        }

        // 建大顶堆
        self::buildHeap($result, $K);

        // 遍历后面的
        for ($i = $K; $i < $length; $i++) {
            $key = $points[$i][0] * $points[$i][0] + $points[$i][1] * $points[$i][1];
            if ($key < $result[0]->key) {
                $node = new Node();
                $node->key = $key;
                $node->value = $i;
                $result[0] = $node;
                self::bubbling($result, 0, $K);
            }
        }

        // 收集
        foreach ($result as &$item) {
            $item = $points[$item->value];
        }
        return $result;
    }

    /**
     * 建大顶堆
     *
     * @param array $nums
     * @param int $k
     */
    private static function buildHeap(array &$nums, int $k)
    {
        // 从第 n / 2 个数开始冒最小的数
        for ($i = intdiv($k, 2) - 1; $i >= 0; $i--) {
            self::bubbling($nums, $i, $k);
        }
    }

    /**
     * 将最大值冒上去
     *
     * @param array $nums
     * @param int $index
     * @param int $length
     * @return bool
     */
    private static function bubbling(array &$nums, int $index, int $length): bool
    {
        // 没有子节点退出
        if ($index * 2 + 1 >= $length) {
            return true;
        }
        $l_child_index = $index * 2 + 1;
        $r_child_index = $l_child_index + 1;
        $min_child_index = $l_child_index;
        if ($r_child_index < $length && $nums[$l_child_index]->key < $nums[$r_child_index]->key) {
            $min_child_index = $r_child_index;
        }
        if ($nums[$index]->key >= $nums[$min_child_index]->key) {
            return true;
        }
        // 交换并迭代
        self::swap($nums, $index, $min_child_index);
        return self::bubbling($nums, $min_child_index, $length);
    }

    /**
     * 交换
     *
     * @param array $nums
     * @param int $index1
     * @param int $index2
     */
    private static function swap(array &$nums, int $index1, int $index2)
    {
        $temp = $nums[$index1];
        $nums[$index1] = $nums[$index2];
        $nums[$index2] = $temp;
    }
}