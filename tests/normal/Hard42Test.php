<?php


namespace normal;


use Algorithm\normal\h42\Trap;
use PHPUnit\Framework\TestCase;

class Hard42Test extends TestCase
{
    public function test() {
        $a = Trap::handle([0,1,0,2,1,0,1,3,2,1,2,1]);
        print_r($a);
    }
}