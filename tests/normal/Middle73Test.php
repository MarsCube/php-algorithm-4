<?php


namespace normal;


use Algorithm\normal\m73\SetZeroes;
use PHPUnit\Framework\TestCase;

class Middle73Test extends TestCase
{
    public function test() {
        $arr = [[1,1,1],[1,0,1],[1,1,1]];
        SetZeroes::handle($arr);
        var_dump($arr);
    }
}