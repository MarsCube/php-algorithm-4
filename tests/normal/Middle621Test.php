<?php


namespace normal;

use Algorithm\normal\m621\LeastInterval;
use PHPUnit\Framework\TestCase;

class Middle621Test extends TestCase
{
    public function test() {
        $result = LeastInterval::handle(["A","A","A","B","B","B"], 2);
        $this->assertEquals(8, $result);

        $result = LeastInterval::handle(["A","A","A","B","B","B"], 0);
        $this->assertEquals(6, $result);

        $result = LeastInterval::handle(["A","A","A","A","A","A","B","C","D","E","F","G"], 2);
        $this->assertEquals(16, $result);

        $result = LeastInterval::handle(["A","A","A","B","B","B", "C","C","C", "D", "D", "E"], 2);
        $this->assertEquals(12, $result);
    }
}