<?php


namespace Algorithm\normal\m371;

/**
 * 两整数之和
 *
 * 不使用运算符 + 和 - ，计算两整数 a 、b 之和。
 *
 * Class GetSum
 * @package Algorithm\normal\m371
 */
class GetSum
{
    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    public static function handle(int $a, int $b): int
    {
        // a + b 的问题拆分为 (a 和 b 的无进位结果) + (a 和 b 的进位结果)
        // 无进位加法使用异或运算计算得出
        // 进位结果使用与运算和移位运算计算得出
        // 循环此过程，直到进位为 0

        // 101 5
        // 111 7

        // 010 0代表进位或为0
        // 101 为1的代表进位，左移为进位的加上值  1010

        // 1000
        // 0010 => 0100

        // 1100 8 + 4
        // 0000 全0代表无进位
        if ($a == 0) return $b;
        if ($b == 0) return $a;

        $c = $a ^ $b;
        $d = ($a & $b) << 1;

        return self::handle($c, $d);
    }
}