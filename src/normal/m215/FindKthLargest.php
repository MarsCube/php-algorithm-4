<?php


namespace Algorithm\normal\m215;

/**
 * 数组中的第K个最大元素
 * Class FindKthLargest
 * @package Algorithm\normal\m215
 */
class FindKthLargest
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public static function handle(array $nums, int $k): int
    {
        // 对nums的前K个数据建小顶堆
        self::buildHeap($nums, $k);
        // 从第k+1数开始更新堆
        $length = count($nums);
        for ($i = $k; $i < $length; $i++) {
            if ($nums[$i] > $nums[0]) {
                self::swap($nums, 0, $i);
                self::bubbling($nums, 0, $k);
            }
        }
        return $nums[0];
    }

    /**
     * 建小顶堆
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
     * 将最小值冒上去
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
        if ($r_child_index < $length && $nums[$l_child_index] > $nums[$r_child_index]) {
            $min_child_index = $r_child_index;
        }
        if ($nums[$index] <= $nums[$min_child_index]) {
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