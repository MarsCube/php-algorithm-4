<?php


namespace normal;


use Algorithm\normal\h460\LFUCache;
use PHPUnit\Framework\TestCase;

class Hard460Test extends TestCase
{
    public function test()
    {
        $function = ["LFUCache","put","put","put","put","put","get","put","get","get","put","get","put","put","put","get","put","get","get","get","get","put","put","get","get","get","put","put","get","put","get","put","get","get","get","put","put","put","get","put","get","get","put","put","get","put","put","put","put","get","put","put","get","put","put","get","put","put","put","put","put","get","put","put","get","put","get","get","get","put","get","get","put","put","put","put","get","put","put","put","put","get","get","get","put","put","put","get","put","put","put","get","put","put","put","get","get","get","put","put","put","put","get","put","put","put","put","put","put","put"];
        $args = [[10],[10,13],[3,17],[6,11],[10,5],[9,10],[13],[2,19],[2],[3],[5,25],[8],[9,22],[5,5],[1,30],[11],[9,12],[7],[5],[8],[9],[4,30],[9,3],[9],[10],[10],[6,14],[3,1],[3],[10,11],[8],[2,14],[1],[5],[4],[11,4],[12,24],[5,18],[13],[7,23],[8],[12],[3,27],[2,12],[5],[2,9],[13,4],[8,18],[1,7],[6],[9,29],[8,21],[5],[6,30],[1,12],[10],[4,15],[7,22],[11,26],[8,17],[9,29],[5],[3,4],[11,30],[12],[4,29],[3],[9],[6],[3,4],[1],[10],[3,29],[10,28],[1,20],[11,13],[3],[3,12],[3,8],[10,9],[3,26],[8],[7],[5],[13,17],[2,27],[11,15],[12],[9,19],[2,15],[3,16],[1],[12,17],[9,1],[6,19],[4],[5],[5],[8,1],[11,7],[5,2],[9,28],[1],[2,2],[7,4],[4,22],[7,24],[9,26],[13,28],[11,26]];
//        $function = ["LFUCache","put","put","put","put","get","get","get","get","put","get","get","get","get","get"];
//        $args = [[3],[1,1],[2,2],[3,3],[4,4],[4],[3],[2],[1],[5,5],[1],[2],[3],[4],[5]];

        $lFUCache = new LFUCache($args[0][0]);
        for ($i = 1; $i < count($function); $i++) {
            if ($function[$i] == 'put') {
                $lFUCache->put($args[$i][0], $args[$i][1]);
            } else {
                echo $lFUCache->get($args[$i][0]), PHP_EOL;
            }
//            var_dump($lFUCache->freq_table);
        }
//        $lFUCache->put(1, 1);
//        $lFUCache->put(2, 2);
//        $this->assertEquals(1, $lFUCache->get(1));    // 返回 1
//        $lFUCache->put(3, 3);   // 去除键 2
//        $this->assertEquals(-1, $lFUCache->get(2));    // 返回 -1（未找到）
//        $this->assertEquals(3, $lFUCache->get(3));      // 返回 3
//        $lFUCache->put(4, 4);   // 去除键 1
//        $this->assertEquals(-1, $lFUCache->get(1));      // 返回 -1（未找到）
//        $this->assertEquals(3, $lFUCache->get(3));      // 返回 3
//        $this->assertEquals(4, $lFUCache->get(4));      // 返回 4
    }
}