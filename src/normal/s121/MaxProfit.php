<?php


namespace Algorithm\normal\s121;

/**
 * 买卖股票的最佳时机
 *
 * 给定一个数组 prices ，它的第 i 个元素 prices[i] 表示一支给定股票第 i 天的价格。
 * 你只能选择 某一天 买入这只股票，并选择在 未来的某一个不同的日子 卖出该股票。
 * 设计一个算法来计算你所能获取的最大利润。
 * 返回你可以从这笔交易中获取的最大利润。如果你不能获取任何利润，返回 0 。
 *
 * Class MaxProfit
 * @package Algorithm\normal\s121
 */
class MaxProfit
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    public static function handle(array $prices): int
    {
        $length = sizeof($prices);
        if ($length == 0) {
            return 0;
        }
        $max = 0;
        $min = $prices[0];
        for ($i = 1; $i < $length; $i++) {
            $min = min($prices[$i], $min);
            $max = max($prices[$i] - $min, $max);
        }
        return $max;
    }
}