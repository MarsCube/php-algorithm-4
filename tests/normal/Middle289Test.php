<?php


namespace normal;


use Algorithm\normal\m289\GameOfLife;
use PHPUnit\Framework\TestCase;

class Middle289Test extends TestCase
{
    public function test() {
        $board = [[0,1,0],[0,0,1],[1,1,1],[0,0,0]];
        GameOfLife::handle($board);
        $this->assertEquals([[0,0,0],[1,0,1],[0,1,1],[0,1,0]], $board);

        $board = [[1,1],[1,0]];
        GameOfLife::handle($board);
        $this->assertEquals([[1,1],[1,1]], $board);
    }
}