<?php


namespace Algorithm\normal\s58;

/**
 * 最后一个单词的长度
 *
 * 给你一个字符串 s，由若干单词组成，单词之间用空格隔开。返回字符串中最后一个单词的长度。如果不存在最后一个单词，请返回 0。
 *
 * 单词 是指仅由字母组成、不包含任何空格字符的最大子字符串。
 *
 * Class LengthOfLastWord
 * @package Algorithm\normal\s58
 */
class LengthOfLastWord
{
    /**
     * @param String $s
     * @return Integer
     */
    public static function handle(string $s): int
    {
        $length = strlen($s);
        $result = 0;
        for ($i = $length - 1; $i >= 0; $i--) {
            if ($s[$i] === ' ') {
                if ($result == 0) {
                    continue;
                }
                return $result;
            }
            $result++;
        }
        return $result;
    }
}