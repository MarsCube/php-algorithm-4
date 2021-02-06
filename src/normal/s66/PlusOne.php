<?php


namespace Algorithm\normal\s66;

/**
 * 加一
 *
 * 给定一个由 整数 组成的 非空 数组所表示的非负整数，在该数的基础上加一。
 *
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 *
 * 你可以假设除了整数 0 之外，这个整数不会以零开头。
 *
 * Class PlusOne
 * @package Algorithm\normal\s66
 */
class PlusOne
{
    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    public static function handle(array $digits): array
    {
        $carry = 1;
        $result = [];
        $length = count($digits);
        for ($i = $length - 1; $i >= 0; $i--) {
            $num = $digits[$i] + $carry;
            if ($num > 9) {
                $num = 0;
            } else {
                $carry = 0;
            }
            array_unshift($result, $num);
        }
        if ($carry) {
            array_unshift($result, $carry);
        }
        return $result;
    }
}