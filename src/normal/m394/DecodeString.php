<?php


namespace Algorithm\normal\m394;

/**
 * 字符串解码
 *
 * 给定一个经过编码的字符串，返回它解码后的字符串。
 *
 * 编码规则为: k[encoded_string]，表示其中方括号内部的 encoded_string 正好重复 k 次。
 * 注意 k 保证为正整数。你可以认为输入字符串总是有效的；输入字符串中没有额外的空格，且输入的方括号总是符合格式要求的。
 * 此外，你可以认为原始数据不包含数字，所有的数字只表示重复的次数 k ，例如不会出现像 3a 或 2[4] 的输入。
 *
 * Class DecodeString
 * @package Algorithm\normal\m394
 */
class DecodeString
{
    /**
     * @param String $s
     * @return String
     */
    public static function handle(string $s): string
    {
        $str_len = strlen($s);
        $result = '';
        $num_stack = [];
        $str_stack = [];
        $top_num = 0;
        $top_str = '';
        for ($i = 0; $i < $str_len; $i++) {
            $ascii = ord($s[$i]);
            if ($ascii >= 48 && $ascii <= 57) {
                $top_num = 10 * $top_num + (int)$s[$i];
            } elseif ($s[$i] == '[') { // top_num 压栈并归0
                array_push($num_stack, $top_num);
                array_push($str_stack, $top_str);
                $top_num = 0;
                $top_str = '';
            } elseif ($s[$i] == ']') {
                if ($num_stack) { // 栈不空，将top_str重复 top_num 次
                    $top_num = array_pop($num_stack);
                    $temp_str = '';
                    while ($top_num > 0) {
                        $temp_str .= $top_str;
                        $top_num--;
                    }
                    $top_str = array_pop($str_stack) . $temp_str;
                }
            } else {
                $top_str .= $s[$i];
            }
            // 栈空的时候，要把top_str并入result，并清空 top_str
            if (!$num_stack) {
                $result .= $top_str;
                $top_str = '';
            }
        }
        return $result;
    }
}