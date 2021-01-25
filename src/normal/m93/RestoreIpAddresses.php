<?php


namespace Algorithm\normal\m93;

/**
 * 复原IP地址
 *
 * 给定一个只包含数字的字符串，复原它并返回所有可能的 IP 地址格式。
 * 有效的 IP 地址 正好由四个整数（每个整数位于 0 到 255 之间组成，且不能含有前导 0），整数之间用 '.' 分隔。
 * 例如："0.1.2.201" 和 "192.168.1.1" 是 有效的 IP 地址。
 * 但是 "0.011.255.245"、"192.168.1.312" 和 "192.168@1.1" 是 无效的 IP 地址。
 *
 * 输入：s = "25525511135"
 * 输出：["255.255.11.135","255.255.111.35"]
 *
 * Class RestoreIpAddresses
 * @package Algorithm\normal\m93
 */
class RestoreIpAddresses
{
    /**
     * @param String $s
     * @return String[]
     */
    public static function handle(string $s): array
    {
        return self::cut($s, 0, strlen($s) - 1, 4);
    }

    /**
     * 迭代切割
     *
     * @param string $string
     * @param int $start
     * @param int $end
     * @param int $n
     * @return array|false
     */
    private static function cut(string &$string, int $start, int $end, int $n)
    {
        $length = $end - $start + 1;
        if ($length < $n || $length > 3 * $n) {
            return [];
        }
        if ($n == 1) {
            // 不只有一位，但首位是0
            if ($end !== $start && $string[$start] == '0') {
                return [];
            }
            // 剩下的数超过 255
            $str = substr($string, $start);
            if ((int)$str > 255) {
                return [];
            }
            return [$str];
        }
        $result = [];
        $max_len = min($end - $start + 1, 3);
        for ($i = 1; $i <= $max_len; $i++) {
            $str = substr($string, $start, $i);
            // 大于255直接停止循环
            if ($i == 3 && (int)$str > 255) {
                break;
            }
            $remain = self::cut($string, $start + $i, $end, $n - 1);
            foreach ($remain as $item) {
                $result[] = $str . '.' . $item;
            }
            // 等于0 只能算一位
            if ($str == '0') {
                break;
            }
        }
        return $result;
    }
}