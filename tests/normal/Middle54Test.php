<?php


namespace normal;


use Algorithm\normal\m54\SpiralOrder;
use PHPUnit\Framework\TestCase;

class Middle54Test extends TestCase
{
    public function test() {
        $matrix = [[3],[2]];
        $a = SpiralOrder::handle($matrix);
        print_r($a);
    }
}