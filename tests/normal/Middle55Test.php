<?php


namespace normal;


use Algorithm\normal\m55\CanJump;
use PHPUnit\Framework\TestCase;

class Middle55Test extends TestCase
{
    public function test() {
        $result = CanJump::handle([2,3,1,1,4]);
        $this->assertTrue($result);
    }
}