<?php


namespace normal;


use Algorithm\normal\h123\MaxProfit;
use PHPUnit\Framework\TestCase;

class Hard123Test extends TestCase
{
    public function test() {
        $result = MaxProfit::handle([14,9,10,12,4,8,1,16]);
        print_r($result);die();
    }
}