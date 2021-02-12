<?php


namespace normal;


use Algorithm\normal\m994\OrangesRotting;
use PHPUnit\Framework\TestCase;

class Middle994Test extends TestCase
{
    public function test() {
        $result = OrangesRotting::handle([[2,1,1],[1,1,0],[0,1,1]]);
        $this->assertEquals(4, $result);

        $result = OrangesRotting::handle([[0,2]]);
        $this->assertEquals(0, $result);

        $result = OrangesRotting::handle([[2,1,1],[0,1,1],[1,0,1]]);
        $this->assertEquals(-1, $result);
    }
}