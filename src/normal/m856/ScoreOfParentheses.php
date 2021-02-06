<?php


namespace Algorithm\normal\m856;

/**
 * 括号的分数
 *
 * 给定一个平衡括号字符串 S，按下述规则计算该字符串的分数：
 *
 * () 得 1 分。
 * AB 得 A + B 分，其中 A 和 B 是平衡括号字符串。
 * (A) 得 2 * A 分，其中 A 是平衡括号字符串。
 *
 * Class ScoreOfParentheses
 * @package Algorithm\normal\m856
 */
class ScoreOfParentheses
{
    /**
     * @param String $S
     * @return Integer
     */
    public static function handle(string $S): int
    {
        $result = 0;
        $depth = 0;
        $length = strlen($S);
        $base = 1;
        for ($i = 0; $i < $length; $i++) {
            if ($S[$i] == '(') {
                $depth++;
                $base *= 2;
            } else {
                $depth--;
                $base /= 2;
                if ($S[$i - 1] == '(') {
                    $result+= $base;
                }
            }
        }
        return $result;
    }
}