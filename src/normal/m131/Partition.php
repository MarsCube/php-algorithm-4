<?php


namespace Algorithm\normal\m131;

/**
 * 分割回文串
 *
 * 给定一个字符串 s，将 s 分割成一些子串，使每个子串都是回文串。
 * 返回 s 所有可能的分割方案。
 *
 * Class Partition
 * @package Algorithm\normal\m131
 */
class Partition
{
    private static $result;

    /**
     * @param String $s
     * @return String[][]
     */
    public static function handle(string $s): array
    {
        self::$result = [];
        $arr = [];
        // 来个回溯
        self::helper($s, 0, strlen($s) - 1, $arr);
        return self::$result;
    }

    private static function helper(&$s, $start, $end, &$arr)
    {
        if ($start > $end) {
            self::$result[] = $arr;
        }
        for ($i = $start; $i <= $end; $i++) {
            if (self::isPalindrome($s, $start, $i)) {
                $arr[] = substr($s, $start, $i - $start + 1);
                self::helper($s, $i + 1, $end, $arr);
                array_pop($arr);
            }
        }
    }

    private static function isPalindrome(&$s, $start, $end)
    {
        while ($start < $end) {
            if ($s[$start] != $s[$end]) {
                return false;
            }
            $start++;
            $end--;
        }

        return true;
    }
}