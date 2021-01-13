<?php


namespace normal;


use Algorithm\normal\m59\GenerateMatrix;
use PHPUnit\Framework\TestCase;

class Middle59Test extends TestCase
{
    public function test() {
        $a = GenerateMatrix::handle(3);
        print_r($a);
    }
}