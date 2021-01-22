<?php


namespace Algorithm\normal\m150;

use SplStack;

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
        $num_stack = new SplStack();
        foreach ($tokens as $token) {
            switch ($token) {
                case '+':
                    $num_stack->push($num_stack->pop() + $num_stack->pop());
                    break;
                case '-':
                    $num1 = $num_stack->pop();
                    $num_stack->push($num_stack->pop() - $num1);
                    break;
                case '*':
                    $num_stack->push($num_stack->pop() * $num_stack->pop());
                    break;
                case '/':
                    $num1 = $num_stack->pop();
                    $num_stack->push(intdiv($num_stack->pop(), $num1));
                    break;
                default:
                    $num_stack->push($token);
                    break;
            }
        }
        return $num_stack->pop();
    }
}