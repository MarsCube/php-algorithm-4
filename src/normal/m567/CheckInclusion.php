<?php


namespace Algorithm\normal\m567;

/**
 * 字符串的排列
 *
 * 给定两个字符串 s1 和 s2，写一个函数来判断 s2 是否包含 s1 的排列。
 *
 * 换句话说，第一个字符串的排列之一是第二个字符串的子串。
 *
 * Class CheckInclusion
 * @package Algorithm\normal\m567
 */
class CheckInclusion
{
    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public static function handle(string $s1, string $s2): bool
    {
        $map1 = self::initMap($s1);
        $map2 = self::initMap(substr($s2, 0, strlen($s1)));
        if ($map1 == $map2) {
            return true;
        }
        for ($i = strlen($s1); $i < strlen($s2); $i++) {
            $add_index = ord($s2[$i]) - 97;
            $del_index = ord($s2[$i - strlen($s1)]) - 97;
            $map2[$add_index]++;
            $map2[$del_index]--;
            if ($map1 == $map2) {
                return true;
            }
        }
        return false;
    }

    /**
     * 初始化map
     *
     * @param string $s
     * @return array
     */
    private static function initMap(string $s): array
    {
        $result = array_fill(0, 26, 0);
        $str_len = strlen($s);
        for ($i = 0; $i < $str_len; $i++) {
            $index = ord($s[$i]) - 97;
            $result[$index]++;
        }
        return $result;
    }
}