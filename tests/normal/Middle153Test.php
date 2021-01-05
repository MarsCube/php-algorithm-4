<?php

namespace normal;

use Algorithm\normal\m153\FindMin;
use PHPUnit\Framework\TestCase;

class Middle153Test extends TestCase
{
    public function test() {
        $this->assertEquals(0, FindMin::handle([4,5,6,7,0,1,2]));
    }
}