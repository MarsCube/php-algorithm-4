<?php


namespace Algorithm\normal\m306;

/**
 * 累加数
 * 累加数是一个字符串，组成它的数字可以形成累加序列。
 * 一个有效的累加序列必须至少包含 3 个数。除了最开始的两个数以外，字符串中的其他数都等于它之前两个数相加的和。
 * 给定一个只包含数字 '0'-'9' 的字符串，编写一个算法来判断给定输入是否是累加数。
 * 说明: 累加序列里的数不会以 0 开头，所以不会出现 1, 2, 03 或者 1, 02, 3 的情况。
 *
 * Class IsAdditiveNumber
 * @package Algorithm\normal\m306
 */
class IsAdditiveNumber
{
    /**
     * @param String $num
     * @return Boolean
     */
    public static function handle(string $num): bool
    {
        $length = strlen($num);
        if ($length == 0) {
            return false;
        }
        $num1_max_len = $num[0] == '0' ? 1 : intdiv($length, 2);
        // 第一位的长度不能超过 length / 2
        for ($i = 1; $i <= $num1_max_len; $i++) {
            $int1 = (int)substr($num, 0, $i);
            // 第二位的长度不能超过 剩余 长度 的 一半。
            $num2_max_len = $num[$i] == '0' ? 1 : intdiv($length - $i, 2);
            for ($j = 1; $j <= $num2_max_len; $j++) {
                $int2 = (int)substr($num, $i, $j);
                if (self::check(substr($num, $i + $j), $int1, $i, $int2, $j)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * 校验字符串的前几位是否有 两个整数的 和
     * @param string $str
     * @param int $int1
     * @param int $length1
     * @param int $int2
     * @param int $length2
     * @return bool
     */
    private static function check(string $str, int $int1, int $length1, int $int2, int $length2): bool
    {
        $str_len = strlen($str);
        $pre_max_len = max($length1, $length2);
        if ($str_len < $pre_max_len) {
            return false;
        }
        $num_max_len = $str[0] == '0' ? 1 : $str_len;
        for ($i = $pre_max_len; $i <= $num_max_len; $i++) {
            $int3 = substr($str, 0, $i);
            if ($int3 < $int1 + $int2) {
                continue;
            } elseif ($int3 > $int1 + $int2) {
                return false;
            } else {
                return $i == $num_max_len ? true : self::check(substr($str, $i), $int2, $length2, $int3, $i);
            }
        }
        return false;
    }
}