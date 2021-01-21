<?php


namespace normal;


use Algorithm\normal\m279\NumSquares;
use PHPUnit\Framework\TestCase;

class Middle279Test extends TestCase
{
    public function test() {
        $result = NumSquares::handle(12);
        var_dump($result);
    }

}