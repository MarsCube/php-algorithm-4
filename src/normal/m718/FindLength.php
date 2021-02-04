<?php


namespace Algorithm\normal\m718;


/**
 * 最长重复子数组
 *
 * 给两个整数数组 A 和 B ，返回两个数组中公共的、长度最长的子数组的长度。
 *
 * Class FindLength
 * @package Algorithm\normal\m718
 */
class FindLength
{
    /**
     * @param Integer[] $A
     * @param Integer[] $B
     * @return Integer
     */
    public static function handle(array $A, array $B): int
    {
        // 滑动窗口
        $a_len = count($A);
        $b_len = count($B);
        $result = 0;
        // 保持B不动，A滑 -- 直到头对齐
        for ($i = $a_len - 1; $i >= 0; $i--) {
            // 重叠区域
            $overlap = min($a_len - $i, $b_len);
            if ($overlap <= $result) {
                break;
            }
            $result = max($result, self::maxLength($A, $i, $B, 0, $overlap));
        }
        // 继续滑
        for ($i = 1; $i < $b_len; $i++) {
            // 重叠区域
            $overlap = min($b_len - $i, $a_len);
            if ($overlap <= $result) {
                break;
            }
            $result = max($result, self::maxLength($A, 0, $B, $i, $overlap));
        }
        return $result;
    }

    /**
     * @param array $A
     * @param Integer $a_start
     * @param array $B
     * @param Integer $b_start
     * @param Integer $len
     * @return int
     */
    private static function maxLength(array &$A, int $a_start, array &$B, int $b_start, int $len): int
    {
        $result = 0;
        $same = 0;
        while ($len > 0) {
            if ($A[$a_start] == $B[$b_start]) {
                $same++;
            } else {
                $result = max($result, $same);
                $same = 0;
            }
            $a_start++;
            $b_start++;
            $len--;
        }
        return max($result, $same);
    }
}