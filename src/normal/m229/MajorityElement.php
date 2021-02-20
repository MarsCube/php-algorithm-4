<?php


namespace Algorithm\normal\m229;

/**
 * 求众数 II
 *
 * 给定一个大小为 n 的整数数组，找出其中所有出现超过 ⌊ n/3 ⌋ 次的元素。
 *
 * 进阶：尝试设计时间复杂度为 O(n)、空间复杂度为 O(1)的算法解决此问题。。
 *
 * Class MajorityElement
 * @package Algorithm\normal\m229
 */
class MajorityElement
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    public static function handle(array $nums): array
    {
        // 摩尔投票，对拼消耗。剩下的再去判断是否大于 一半
        // 摩尔升级
        $int1 = $int2 = '#';
        $count1 = $count2 = 0;
        foreach ($nums as $num) {
            if ($num === $int1) {
                $count1++;
            } elseif ($num === $int2) {
                $count2++;
            } elseif ($count1 === 0) {
                $int1 = $num;
                $count1++;
            } elseif ($count2 === 0) {
                $int2 = $num;
                $count2++;
            } else {
                $count1--;
                $count2--;
            }
        }

        // 获取次数
        $count1 = $count2 = 0;
        foreach ($nums as $num) {
            if ($num === $int1) {
                $count1++;
            } elseif ($num === $int2) {
                $count2++;
            }
        }

        // 比较次数
        $base = intdiv(count($nums), 3);
        $result = [];
        if ($count1 > $base) {
            $result[] = $int1;
        }
        if ($count2 > $base) {
            $result[] = $int2;
        }
        return $result;
    }
}