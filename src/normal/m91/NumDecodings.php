<?php


namespace Algorithm\normal\m91;

/**
 * 解码方法
 *
 * 一条包含字母 A-Z 的消息通过以下映射进行了 编码 ：
 *
 * 'A' -> 1
 * 'B' -> 2
 * ...
 * 'Z' -> 26
 *
 * 要 解码 已编码的消息，所有数字必须基于上述映射的方法，反向映射回字母（可能有多种方法）。
 * 例如，"111" 可以将 "1" 中的每个 "1" 映射为 "A" ，从而得到 "AAA" ，或者可以将 "11" 和 "1"（分别为 "K" 和 "A" ）映射为 "KA" 。
 * 注意，"06" 不能映射为 "F" ，因为 "6" 和 "06" 不同。
 *
 * 给你一个只含数字的 非空 字符串 num ，请计算并返回 解码 方法的 总数 。
 *
 * 题目数据保证答案肯定是一个 32 位 的整数。
 *
 * Class NumDecodings
 * @package Algorithm\normal\m91
 */
class NumDecodings
{
    private static $map;

    private static $s;

    /**
     * @param String $s
     * @return Integer
     */
    public static function handle(string $s): int
    {
        self::$map = [];
        self::$s = $s;
        return self::helper(0);
    }

    /**
     * @param Integer $start
     * @return int
     */
    private static function helper(int $start): int
    {
        if ($start < strlen(self::$s) && self::$s[$start] == '0') {
            return 0;
        }
        if ($start >= strlen(self::$s) - 1) {
            return 1;
        }
        if (!isset(self::$map[$start])) {
            if (substr(self::$s, $start, 2) > 26) {
                self::$map[$start] = self::helper($start + 1);
            } else {
                self::$map[$start] = self::helper($start + 1) + self::helper($start + 2);
            }
        }
        return self::$map[$start];
    }
}