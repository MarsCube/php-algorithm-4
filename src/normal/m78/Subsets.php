<?php


namespace Algorithm\normal\m78;

/**
 * 子集
 *
 * 给你一个整数数组 nums ，数组中的元素 互不相同 。返回该数组所有可能的子集（幂集）。
 * 解集 不能 包含重复的子集。你可以按 任意顺序 返回解集。
 *
 * 输入：nums = [1,2,3]
 * 输出：[[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]
 *
 * Class Subsets
 * @package Algorithm\normal\m78
 */
class Subsets
{
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public static function handle(array $nums): array
    {
        $result = [[]];
        foreach ($nums as $num) {
            // 遍历原来的，为数组中每个元素加上值后再次放入数组
            foreach ($result as $item) {
                $item[] = $num;
                $result[] = $item;
            }
        }
        return $result;
    }
}