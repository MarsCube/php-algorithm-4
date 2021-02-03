<?php


namespace Algorithm\normal\m56;

/**
 * 合并区间
 *
 * 以数组 intervals 表示若干个区间的集合，其中单个区间为 intervals[i] = [starti, endi] 。
 * 请你合并所有重叠的区间，并返回一个不重叠的区间数组，该数组需恰好覆盖输入中的所有区间。
 *
 * Class Merge
 * @package Algorithm\normal\m56
 */
class Merge
{
    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    public static function handle(array $intervals): array
    {
        $length = count($intervals);
        if ($length == 0) {
            return [];
        }
        array_multisort($intervals);
        $result[0] = $intervals[0];
        $index = 0;
        for ($i = 1; $i < $length; $i++) {
            if ($intervals[$i][0] <= $result[$index][1]) {
                $result[$index][1] = max($intervals[$i][1], $result[$index][1]);
            } else {
                $result[++$index] = $intervals[$i];
            }
        }
        return $result;
    }
}