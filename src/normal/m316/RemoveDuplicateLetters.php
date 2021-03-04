<?php


namespace Algorithm\normal\m316;

use SplStack;

/**
 * 去除重复字母
 *
 * 给你一个字符串 s ，请你去除字符串中重复的字母，使得每个字母只出现一次。需保证 返回结果的字典序最小（要求不能打乱其他字符的相对位置）。
 *
 * Class RemoveDuplicateLetters
 * @package Algorithm\normal\m316
 */
class RemoveDuplicateLetters
{
    /**
     * @param String $s
     * @return String
     */
    public static function handle(string $s): string
    {
        $visited = array_fill(0, 26, false);
        $nums = array_fill(0, 26, 0);
        $stack = new SplStack();
        $length = strlen($s);
        // 统计字母数量
        for ($i = 0; $i < $length; $i++) {
            $nums[ord($s[$i]) - 97]++;
        }
        for ($i = 0; $i < $length; $i++) {
            if (!$visited[ord($s[$i]) - 97]) {//字符没有出现在栈中
                //关键，这里要循环栈中元素，直到栈顶字符的字典序比当前字符小，否则一直出栈，并且更新visited
                while (!$stack->isEmpty() && ord($s[$i]) < ord($stack->top()) && $nums[ord($stack->top()) - 97] > 0) {
                    $top = $stack->pop();//出栈
                    $visited[ord($top) - 97] = false;//更新visited
                }
                $stack->push($s[$i]);//入栈
                $visited[ord($s[$i])- 97] = true;//更新visited
            }
            $nums[ord($s[$i]) - 97]--;    //计数器-1
        }

        $result = '';
        while (!$stack->isEmpty()) {//栈中所有元素就是最终答案
            $result = $stack->pop() . $result;
        }
        return $result;
    }
}