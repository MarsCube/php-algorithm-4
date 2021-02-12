<?php


namespace Algorithm\normal\s119;

/**
 * 杨辉三角 II
 *
 * 给定一个非负索引 k，其中 k ≤ 33，返回杨辉三角的第 k 行。
 * 在杨辉三角中，每个数是它左上方和右上方的数的和。
 *
 * Class GetRow
 * @package Algorithm\normal\s119
 */
class GetRow
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    public static function handle(int $rowIndex): array
    {
        // O(1)时间复杂度
        $result = array_fill(0, $rowIndex + 1, 1);
        $result[0] = 1;
        for ($i = 1; $i <= $rowIndex; $i++) {
            // 第一个是1，保持不变，最后一个是1，只需要计算中间的
            // 由于加的过程中会交替覆盖一个，所以需要temp
            $temp = $result[0];
            for ($j = 1; $j <= $i - 1; $j++) {
                $next = $result[$j];
                $result[$j] = $temp + $result[$j];
                $temp = $next;
            }
        }
        return $result;
    }
}