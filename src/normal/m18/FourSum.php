<?php


namespace Algorithm\normal\m18;

/**
 * 四数之和
 *
 * 给定一个包含 n 个整数的数组 nums 和一个目标值 target，
 * 判断 nums 中是否存在四个元素 a，b，c 和 d ，
 * 使得 a + b + c + d 的值与 target 相等？
 * 找出所有满足条件且不重复的四元组。
 *
 * Class FourSum
 * @package Algorithm\normal\m18
 */
class FourSum
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    public static function handle(array $nums, int $target): array
    {
        sort($nums);
        $length = count($nums);
        $result = [];
        // 先确定一个数
        for ($i = 0; $i < $length - 3; $i++) {
            $three_sum = $target - $nums[$i];
            // 再确定一个数
            for ($j = $i + 1; $j < $length - 2; $j++) {
                $two_sum = $three_sum - $nums[$j];
                $left = $j + 1;
                $right = $length - 1;
                while ($left < $right) {
                    if ($nums[$left] + $nums[$right] > $two_sum) {
                        $right--;
                    } elseif ($nums[$left] + $nums[$right] < $two_sum) {
                        $left++;
                    } else {
                        $result[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                        $right--;
                        $left++;
                        while ($left < $right && $nums[$left] == $nums[$left - 1]) {
                            $left++;
                        }
                        while ($left < $right && $nums[$right] == $nums[$right + 1]) {
                            $right--;
                        }
                    }
                }
                while ($j < $length - 2 && $nums[$j] == $nums[$j + 1]) {
                    $j++;
                }
            }
            while ($i < $length - 3 && $nums[$i] == $nums[$i + 1]) {
                $i++;
            }
        }
        return $result;
    }
}