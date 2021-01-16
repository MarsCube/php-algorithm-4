<?php


namespace normal;


use Algorithm\normal\m31\NextPermutation;
use PHPUnit\Framework\TestCase;

class Middle31Test extends TestCase
{
    public function test() {
        $result = [2,3,1];
        NextPermutation::handle($result);
        print_r($result);
    }
}