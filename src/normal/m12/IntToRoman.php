<?php


namespace Algorithm\normal\m12;

/**
 * 整数转罗马数字
 * 罗马数字包含以下七种字符： I， V， X， L，C，D 和 M。
 *
 * 字符          数值
 * I             1
 * V             5
 * X             10
 * L             50
 * C             100
 * D             500
 * M             1000
 *
 * Class IntToRoman
 * @package Algorithm\normal\m12
 */
class IntToRoman
{
    /**
     * 1 <= num <= 3999
     *
     * @param Integer $num
     * @return String
     */
    public static function handle(int $num): string
    {
        $num1 = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"];
        $num2 = ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"];
        $num3 = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"];
        $num4 = ["", "M", "MM", "MMM"];
        $result = '';
        $base = 1000;
        for ($i = 4; $i >= 1; $i--) {
            $array = 'num' . $i;
            $result .= ($$array)[intdiv($num, $base)];
            $num = $num % $base;
            $base = $base / 10;
        }
        return $result;
    }
}