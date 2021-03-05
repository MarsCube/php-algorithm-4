<?php


namespace normal;


use Algorithm\normal\m456\Find132pattern;
use PHPUnit\Framework\TestCase;

class Middle456Test extends TestCase
{
    public function test()
    {
        $this->assertFalse(Find132pattern::handle([1, 2, 3, 4]));

        $this->assertTrue(Find132pattern::handle([3, 1, 4, 2]));

        $this->assertTrue(Find132pattern::handle([-1, 3, 2, 0]));

        $this->assertTrue(Find132pattern::handle([1, 3, 2, 4, 5, 6, 7, 8, 9, 10]));

        $this->assertTrue(Find132pattern::handle([3, 5, 0, 3, 4]));
    }
}