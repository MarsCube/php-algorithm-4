<?php


namespace normal;


use Algorithm\normal\m95\GenerateTrees;
use PHPUnit\Framework\TestCase;

class Middle95Test extends TestCase
{
    public function test() {
        $result = GenerateTrees::handle(0);
        var_dump($result);
    }
}