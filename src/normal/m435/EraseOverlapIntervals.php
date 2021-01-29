<?php


namespace Algorithm\normal\m435;

/**
 * 无重叠区间
 *
 * 给定一个区间的集合，找到需要移除区间的最小数量，使剩余区间互不重叠。
 *
 * 注意:
 * 可以认为区间的终点总是大于它的起点。
 * 区间 [1,2] 和 [2,3] 的边界相互“接触”，但没有相互重叠。
 *
 * Class EraseOverlapIntervals
 * @package Algorithm\normal\m435
 */
class EraseOverlapIntervals
{
    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    public static function handle(array $intervals): int
    {
        $length = count($intervals);
        if ($length == 0) {
            return 0;
        }
        array_multisort($intervals);
        $start = 0;
        $result = 0;
        for ($i = 1; $i < $length; $i++) {
            if ($intervals[$i][0] < $intervals[$start][1]) {
                $result++;
                // 删掉 buffer 大的
                $start = $intervals[$i][1] < $intervals[$start][1] ? $i : $start;
            } else {
                $start = $i;
            }
        }
        return $result;
    }

}