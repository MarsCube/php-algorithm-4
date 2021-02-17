<?php


namespace Algorithm\normal\m377;

/**
 * 组合总和 Ⅳ
 *
 * 给定一个由正整数组成且不存在重复数字的数组，找出和为给定目标正整数的组合的个数。
 *
 * Class CombinationSum4
 * @package Algorithm\normal\m377
 */
class CombinationSum4
{
    public $remind;

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function handle(array $nums, int $target): int
    {
        if ($target < 0) {
            return 0;
        }
        if ($target == 0) {
            return 1;
        }
        if (!isset($this->remind[$target])) {
            $this->remind[$target] = 0;
            foreach ($nums as $num) {
                $this->remind[$target] += $this->handle($nums, $target - $num);
            }
        }
        return $this->remind[$target];
    }
}