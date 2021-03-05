<?php


namespace Algorithm\normal\m443;

/**
 * 压缩字符串
 *
 * 给定一组字符，使用原地算法将其压缩。
 *
 * 压缩后的长度必须始终小于或等于原数组长度。
 *
 * 数组的每个元素应该是长度为1的字符（不是 int 整数类型）。
 *
 * 在完成原地修改输入数组后，返回数组的新长度。
 *
 * 你能否仅使用O(1) 空间解决问题
 *
 * Class Compress
 * @package Algorithm\normal\m443
 */
class Compress
{
    /**
     * @param String[] $chars
     * @return Integer
     */
    public static function handle(array &$chars): int
    {
        $slow = 0;
        $fast = 1;
        $count = sizeof($chars);
        if ($count == 0) {
            return 0;
        }
        $char_count = 1;
        while ($fast < $count) {
            if ($chars[$fast] != $chars[$slow]) {
                if ($char_count > 1) {
                    $char_count = strval($char_count);
                    for ($i = 0; $i < strlen($char_count); $i++) {
                        $chars[++$slow] = $char_count[$i];
                    }
                    $char_count = 1;
                }
                $chars[++$slow] = $chars[$fast];
            } else {
                $char_count++;
            }
            $fast++;
        }
        if ($char_count > 1) {
            $char_count = strval($char_count);
            for ($i = 0; $i < strlen($char_count); $i++) {
                $chars[++$slow] = $char_count[$i];
            }
        }
        return $slow + 1;
    }
}