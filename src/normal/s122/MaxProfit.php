<?php


namespace Algorithm\normal\s122;

/**
 * 买卖股票的最佳时机 II
 *
 * 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 * 设计一个算法来计算你所能获取的最大利润。你可以尽可能地完成更多的交易（多次买卖一支股票）。
 * 注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *
 * Class MaxProfit
 * @package Algorithm\normal\s122
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
        $sum = $max = 0;
        $min = $prices[0];
        for ($i = 1; $i < $length; $i++) {
            // 曲线向下时，卖出昨天，买入今天。
            if ($prices[$i] < $prices[$i - 1]) {
                $sum += $max;
                $max = 0;
                $min = $prices[$i];
            } elseif ($prices[$i] - $min > $max) {
                $max = $prices[$i] - $min;
            }
        }
        $sum += $max;
        return $sum;
    }
}