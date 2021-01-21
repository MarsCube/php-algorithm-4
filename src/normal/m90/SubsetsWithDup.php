<?php


namespace Algorithm\normal\m90;

/**
 * 子集 II
 *
 * 给定一个可能包含重复元素的整数数组 nums，返回该数组所有可能的子集（幂集）。
 *
 * 输入: [1,2,2]
 * 输出:
 * [
 *  [2],
 *  [1],
 *  [1,2,2],
 *  [2,2],
 *  [1,2],
 *  []
 * ]
 *
 * Class SubsetsWithDup
 * @package Algorithm\normal\m90
 */
class SubsetsWithDup
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public static function handle(array $nums): array
    {
        // 排序，使重复的连在一起
        sort($nums);
        $num_count = count($nums);
        // 记录前一个开始增加数据的位置，重复时做区分
        $pre_count = 0;
        $result[] = [];
        for ($i = 0; $i < $num_count; $i++) {
            $result_count = count($result);
            $start = 0;
            if ($i > 0 && $nums[$i] == $nums[$i-1]) {
                $start = $pre_count;
            }
            $pre_count = $result_count;
            for ($j = $start; $j < $result_count; $j++) {
                $item = $result[$j];
                $item[] = $nums[$i];
                $result[] = $item;
            }
        }
        return $result;
    }
}