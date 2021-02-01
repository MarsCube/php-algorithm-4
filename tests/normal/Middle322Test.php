<?php


namespace normal;


use Algorithm\normal\m322\CoinChange;
use PHPUnit\Framework\TestCase;

class Middle322Test extends TestCase
{
    public function test() {
        $result = CoinChange::handle([186,419,83,408]
, 6249);
        var_dump($result);
    }
}