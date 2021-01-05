<?php


namespace Algorithm\normal\m153;

/**
 * 假设按照升序排序的数组在预先未知的某个点上进行了旋转。
 * 例如，数组 [0,1,2,4,5,6,7] 可能变为 [4,5,6,7,0,1,2] 。
 * 请找出其中最小的元素。
 *
 * Class FindMin153
 * @package App\Algorithm\Practice\Middle
 */
class FindMin
{
    /**
     * 思路：
     * 1. 为什么和右边比较：
     *      [1, 2, 3, 4, 5]
     *      [2, 3, 4, 5, 1]
     *      和左边界比较无法确定最小数的位置。
     * 2. 为什么： $left = $middle + 1
     *      当中间数比右边大时，中间数绝对不会是最小数。
     *      而中间数比右边小时，中间数却可能是最小数：[7, 8, 1, 2, 3]
     * 3. 相等的时候怎么办？能直接返回么？
     *      [0, 1, 1, 1, 1, 1, 1]
     *      [1, 1, 1, 1, 0, 1, 1]
     *      显然不能，而且也无法确定最小数的范围，但可以确定最后一个不是最小数。
     *      如何确定最后一个不是最小数：
     *          循环条件是left < right；中位数是向下取整：可以保证 middle != right，如果从middle到right都一样了，right也可以减
     *
     *
     * @param Integer[] $nums
     * @return Integer
     */
    public static function handle(array $nums): int
    {
        $len = count($nums);
        if ($len == 0) {
            return 0;
        }
        $left = 0;
        $right = $len - 1;

        while ($left < $right) {
            $middle = intdiv(($left + $right), 2);
            if ($nums[$middle] < $nums[$right]) {
                $right = $middle;
            } elseif ($nums[$middle] > $nums[$right]) {
                $left = $middle + 1;
            } else {
                $right--;
            }
        }
        return $nums[$left];
    }
}