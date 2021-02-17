<?php


namespace normal;


use Algorithm\normal\h212\FindWords;
use PHPUnit\Framework\TestCase;

class Hard212Test extends TestCase
{
    public function test() {
        $result = FindWords::handle([["o","a","a","n"],["e","t","a","e"],["i","h","k","r"],["i","f","l","v"]], ["oath","pea","eat","rain"]);
        $this->assertEquals(["oath", "eat"], $result);

        $result = FindWords::handle([["a","b"],["c","d"]], ["abcb"]);
        $this->assertEquals([], $result);
    }
}