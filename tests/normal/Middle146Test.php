<?php


namespace normal;


use Algorithm\normal\m146\LRUCache;
use PHPUnit\Framework\TestCase;

class Middle146Test extends TestCase
{
    public function test()
    {
        $function = ["LRUCache", "put", "put", "get", "put", "get", "put", "get", "get", "get"];
        $args = [[2], [1, 1], [2, 2], [1], [3, 3], [2], [4, 4], [1], [3], [4]];
        $LRUCache = new LRUCache($args[0][0]);
        $result = [null];
        for ($i = 1; $i < count($function); $i++) {
            if ($function[$i] == 'put') {
                $LRUCache->put($args[$i][0], $args[$i][1]);
                $result[] = null;
            } else {
                $result[] = $LRUCache->get($args[$i][0]);
            }
        }
        $this->assertEquals([null, null, null, 1, null, -1, null, -1, 3, 4], $result);
    }
}