<?php


namespace Algorithm\normal\m375;

/**
 * 猜数字大小 II
 *
 * 我们正在玩一个猜数游戏，游戏规则如下：
 *
 * 我从 1 到 n 之间选择一个数字，你来猜我选了哪个数字。
 *
 * 每次你猜错了，我都会告诉你，我选的数字比你的大了或者小了。
 *
 * 然而，当你猜了数字 x 并且猜错了的时候，你需要支付金额为 x 的现金。直到你猜到我选的数字，你才算赢得了这个游戏。
 *
 * Class GetMoneyAmount
 * @package Algorithm\normal\m375
 */
class GetMoneyAmount
{
    private static $map;

    /**
     * @param Integer $n
     * @return Integer
     */
    public static function handle(int $n): int
    {
        return self::helper(1, $n);
    }

    /**
     * @param int $start
     * @param int $end
     * @return int
     */
    private static function helper(int $start, int $end): int
    {
        if ($start >= $end) {
            return 0;
        }
        if (!isset(self::$map[$start . '-' . $end])) {
            $result = PHP_INT_MAX;
            for ($i = $start; $i <= $end; $i++) {
                $result = min($i + max(self::helper($start, $i - 1), self::helper($i + 1, $end)), $result);
            }
            self::$map[$start . '-' . $end] = $result;
        }
        return self::$map[$start . '-' . $end];
    }
}