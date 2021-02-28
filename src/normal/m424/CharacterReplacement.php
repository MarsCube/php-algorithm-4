<?php


namespace Algorithm\normal\m424;

/**
 * 替换后的最长重复字符
 * 给你一个仅由大写英文字母组成的字符串，你可以将任意位置上的字符替换成另外的字符，总共可最多替换 k 次。
 * 在执行上述操作后，找到包含重复字母的最长子串的长度。
 *
 * 注意：字符串长度 和 k 不会超过 10 ^ 4。
 *
 * Class CharacterReplacement
 * @package Algorithm\normal\m424
 */
class CharacterReplacement
{
    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    public static function handle(string $s, int $k): int
    {
        $map = array_fill(0, 26, 0);
        $length = strlen($s);
        $left = -1;
        $maxCount = 0;
        $result = 0;
        for ($i = 0; $i < $length; $i++) {
            $map[ord($s[$i]) - 65]++;
            $maxCount = max($maxCount, $map[ord($s[$i]) - 65]);
            while ($i - $left > $maxCount + $k) {
                // maxCount 无需更新
                $map[ord($s[++$left]) - 65]--;
            }
            $result = max($result, $i - $left);
        }
        return $result;
    }
}