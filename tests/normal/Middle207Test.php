<?php


namespace normal;


use Algorithm\normal\m207\CanFinish;
use PHPUnit\Framework\TestCase;

class Middle207Test extends TestCase
{
    public function test() {
        $this->assertTrue(CanFinish::handle(2, [[0,1]]));
        $this->assertFalse(CanFinish::handle(2, [[1,0],[0,1]]));
    }
}