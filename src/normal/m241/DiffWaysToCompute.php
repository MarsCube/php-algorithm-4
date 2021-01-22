<?php


namespace Algorithm\normal\m241;

/**
 * 为运算表达式设计优先级
 *
 * 给定一个含有数字和运算符的字符串，为表达式添加括号，改变其运算优先级以求出不同的结果。你需要给出所有可能的组合的结果。有效的运算符号包含 +,-以及*。
 *
 * 输入: "2-1-1"
 * 输出: [0, 2]
 * 解释:
 * ((2-1)-1) = 0
 * (2-(1-1)) = 2
 *
 * Class DiffWaysToCompute
 * @package Algorithm\normal\m241
 */
class DiffWaysToCompute
{
    /**
     * @param String $input
     * @return Integer[]
     */
    public static function handle(string $input): array
    {
        // 和 95 不同的二叉搜索树 一种类型
        $length = strlen($input);
        return self::dfs($input, 0, $length - 1);
    }

    /**
     * 深度优先遍历
     *
     * @param $string
     * @param $start
     * @param $end
     * @return array
     */
    private static function dfs(&$string, $start, $end): array
    {
        $result = [];
        for ($i = $start; $i <= $end; $i++) {
            if ($string[$i] == '+' || $string[$i] == '-' || $string[$i] == '*') {
                $left_list = self::dfs($string, $start, $i - 1);
                $right_list = self::dfs($string, $i + 1, $end);
                foreach ($left_list as $left) {
                    foreach ($right_list as $right) {
                        $result[] = self::calculation($string[$i], $left, $right);
                    }
                }
            }
        }
        if (!$result) {
            return [substr($string, $start, $end - $start + 1)];
        }
        return $result;
    }

    /**
     * 计算
     *
     * @param $symbol
     * @param $num1
     * @param $num2
     * @return float|int
     */
    private static function calculation($symbol, $num1, $num2)
    {
        switch ($symbol) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            default:
                return 0;
        }
    }
}