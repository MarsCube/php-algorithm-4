<?php


namespace Algorithm\normal\m57;

/**
 * 插入区间
 *
 * 给你一个 无重叠的 ，按照区间起始端点排序的区间列表。
 * 在列表中插入一个新的区间，你需要确保列表中的区间仍然有序且不重叠（如果有必要的话，可以合并区间）。
 *
 * Class Insert
 * @package Algorithm\normal\m57
 */
class Insert
{
    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    public static function handle(array $intervals, array $newInterval): array
    {
        $result = [];
        $left = $newInterval[0];
        $right = $newInterval[1];
        $flag = false; // 是否放进去了
        foreach ($intervals as $interval) {
            if ($flag) {
                $result[] = $interval;
            } elseif ($right < $interval[0]) {
                $result[] = [$left, $right];
                $result[] = $interval;
                $flag = true;
            } elseif ($left > $interval[1]) {
                $result[] = $interval;
            } else {
                $left = min($left, $interval[0]);
                $right = max($right, $interval[1]);
            }
        }
        if (!$flag) {
            $result[] = [$left, $right];
        }
        return $result;
    }
}