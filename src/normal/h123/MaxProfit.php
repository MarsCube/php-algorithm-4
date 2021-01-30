<?php


namespace Algorithm\normal\h123;

/**
 * 买卖股票的最佳时机 III
 *
 * 给定一个数组，它的第 i 个元素是一支给定的股票在第 i 天的价格。
 * 设计一个算法来计算你所能获取的最大利润。你最多可以完成 两笔 交易。
 * 注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *
 * Class MaxProfit
 * @package Algorithm\normal\h123
 */
class MaxProfit
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    public static function handle(array $prices): int
    {
        // 状态机 + 动态规划
        // 每天结束时的状态有4种
        // 1. 完成第一次买入
        // 2. 完成第一次卖出
        // 3. 完成第二次买入
        // 4. 完成第二次卖出
        // 动态规划统计收益，每一天都统计各项收益的的最大值
        $length = count($prices);
        if ($length == 0) {
            return 0;
        }
        $buy1 = 0 - $prices[0];
        $sell1 = 0;
        $buy2 = 0 - $prices[0];
        $sell2 = 0;
        for ($i = 1; $i < $length; $i++) {
            $buy1 = max($buy1, 0 - $prices[$i]);
            $sell1 = max($sell1, $buy1 + $prices[$i]);
            $buy2 = max($buy2, $sell1 - $prices[$i]);
            $sell2 = max($sell2, $buy2 + $prices[$i]);
        }
        // 无买卖时，$sell2为0
        // 买卖1次时，$sell2值为$sell1。
        // 均无影响
        return $sell2;
    }
}