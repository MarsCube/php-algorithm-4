<?php


namespace Algorithm\normal\h321;

/**
 * 拼接最大数
 *
 * 给定长度分别为 m855 和 n 的两个数组，其元素由 0-9 构成，表示两个自然数各位上的数字。
 * 现在从这两个数组中选出 k (k <= m855 + n) 个数字拼接成一个新的数，要求从同一个数组中取出的数字保持其在原数组中的相对顺序。
 * 求满足该条件的最大数。结果返回一个表示该最大数的长度为 k 的数组。
 *
 * Class MaxNumber
 * @package Algorithm\normal\h321
 */
class MaxNumber
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[]
     */
    public static function handle(array $nums1, array $nums2, int $k): array
    {
        // 获取截取的第一段的最小个数和最大个数
        $min = max($k - count($nums2), 0);
        $max = min($k, count($nums1));
        $result = array_fill(0, $k, 0);
        for ($i = $min; $i <= $max; $i++) {
            $sub1 = self::getMaxNum($nums1, $i);
            $sub2 = self::getMaxNum($nums2, $k - $i);
            $temp = self::mergeArray($sub1, $sub2);
            $result = self::compare($result, 0, $temp, 0) >= 0 ? $result : $temp;
        }
        return $result;
    }

    /**
     * 不变顺序的情况下，num个数组成的最大数
     *
     * @param array $nums
     * @param int $num
     * @return array
     */
    private static function getMaxNum(array &$nums, int $num): array
    {
        if ($num == 0) {
            return [];
        }
        $total = count($nums);
        $stack = [];
        $remind = $total - $num;
        for ($i = 0; $i < $total; $i++) {
            while ($remind > 0 && count($stack) > 0 && end($stack) < $nums[$i]) {
                $remind--;
                array_pop($stack);
            }
            if (count($stack) == $num) {
                $remind--;
            } else {
                array_push($stack, $nums[$i]);
            }
        }
        return $stack;
    }

    /**
     * 有序合并两个数组
     *
     * @param $arr1
     * @param $arr2
     * @return array
     */
    private static function mergeArray(&$arr1, &$arr2): array
    {
        $length1 = count($arr1);
        $length2 = count($arr2);
        $index1 = $index2 = 0;
        $result = [];
        while ($index1 < $length1 || $index2 < $length2) {
            if (self::compare($arr1, $index1, $arr2, $index2) >= 0) {
                array_push($result, $arr1[$index1++]);
            } else {
                array_push($result, $arr2[$index2++]);
            }
        }
        return $result;
    }

    /**
     * 比较两个数组
     *
     * @param array $arr1
     * @param int $index1
     * @param array $arr2
     * @param int $index2
     * @return int
     */
    private static function compare(array &$arr1, int $index1, array &$arr2, int $index2): int
    {
        $length1 = count($arr1);
        $length2 = count($arr2);
        while ($index1 < $length1 && $index2 < $length2) {
            if ($arr1[$index1] > $arr2[$index2]) {
                return 1;
            } elseif ($arr1[$index1] < $arr2[$index2]) {
                return -1;
            }
            $index1++;
            $index2++;
        }
        return ($length1 - $index1) - ($length2 - $index2);
    }
}