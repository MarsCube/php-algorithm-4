<?php


namespace Algorithm\normal\m71;

use SplStack;

/**
 * 简化路径
 *
 * 以 Unix 风格给出一个文件的绝对路径，你需要简化它。或者换句话说，将其转换为规范路径。
 *
 * 在 Unix 风格的文件系统中，一个点（.）表示当前目录本身；此外，两个点 （..） 表示将目录切换到上一级（指向父目录）；
 * 两者都可以是复杂相对路径的组成部分。更多信息请参阅：Linux / Unix中的绝对路径 vs 相对路径
 *
 * 请注意，返回的规范路径必须始终以斜杠 / 开头，并且两个目录名之间必须只有一个斜杠 /。
 * 最后一个目录名（如果存在）不能以 / 结尾。此外，规范路径必须是表示绝对路径的最短字符串。
 *
 * Class SimplifyPath
 * @package Algorithm\normal\m71
 */
class SimplifyPath
{
    /**
     * @param String $path
     * @return String
     */
    public static function handle(string $path): string
    {
        $arr = explode('/', $path);
        $stack = new SplStack();
        foreach ($arr as $item) {
            if ($item === '..') {
                if (!$stack->isEmpty()) {
                    $stack->pop();
                }
            } elseif ($item === '.' || $item === '') {
                continue;
            } else {
                $stack->push($item);
            }
        }
        $result = '';
        while (!$stack->isEmpty()) {
            $result = '/' . $stack->pop() . $result;
        }
        return $result ? $result : '/';
    }
}