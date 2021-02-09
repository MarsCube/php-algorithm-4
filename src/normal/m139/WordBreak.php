<?php


namespace Algorithm\normal\m139;

/**
 * 单词拆分
 *
 * 给定一个非空字符串 s 和一个包含非空单词的列表 wordDict，判定 s 是否可以被空格拆分为一个或多个在字典中出现的单词。
 *
 * Class WordBreak
 * @package Algorithm\normal\m139
 */
class WordBreak
{
    private static $map;

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    public static function handle(string $s, array $wordDict): bool
    {
        echo $s . PHP_EOL;
        if (strlen($s) == 0) {
            return true;
        }
        if (!isset(self::$map[$s])) {
            $res = false;
            foreach ($wordDict as $word) {
                if (strpos($s, $word) === 0) {
                    $res = self::handle(substr($s, strlen($word)), $wordDict);
                    if ($res == true) {
                        break;
                    }
                }
            }
            self::$map[$s] = $res;
        }
        return self::$map[$s];
    }
}