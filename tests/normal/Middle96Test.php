<?php


namespace normal;


use Algorithm\normal\m96\NumTrees;
use PHPUnit\Framework\TestCase;

class Middle96Test extends TestCase
{
    public function test() {
        $result = NumTrees::handle(3);
        var_dump($result);
    }
}