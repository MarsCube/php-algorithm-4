<?php


namespace Algorithm\normal\m150;

/**
 * 逆波兰表达式求值
 *
 * 有效的运算符包括 +, -, *, / 。每个运算对象可以是整数，也可以是另一个逆波兰表达式。
 *
 * 输入: ["2", "1", "+", "3", "*"]
 * 输出: 9
 * 解释: 该算式转化为常见的中缀算术表达式为：((2 + 1) * 3) = 9
 *
 * Class EvalRPN
 * @package Algorithm\normal\m150
 */
class EvalRPN
{
    /**
     * @param String[] $tokens
     * @return Integer
     */
    public static function handle(array $tokens): int
    {
        $num_stack = [];
        foreach ($tokens as $token) {
            switch ($token) {
                case '+':
                    $num1 = array_pop($num_stack);
                    $num2 = array_pop($num_stack);
                    array_push($num_stack, $num2 + $num1);
                    break;
                case '-':
                    $num1 = array_pop($num_stack);
                    $num2 = array_pop($num_stack);
                    array_push($num_stack, $num2 - $num1);
                    break;
                case '*':
                    $num1 = array_pop($num_stack);
                    $num2 = array_pop($num_stack);
                    array_push($num_stack, $num2 * $num1);
                    break;
                case '/':
                    $num1 = array_pop($num_stack);
                    $num2 = array_pop($num_stack);
                    array_push($num_stack, intdiv($num2, $num1));
                    break;
                default:
                    array_push($num_stack, $token);
                    break;
            }
        }
        return array_pop($num_stack);
    }
}