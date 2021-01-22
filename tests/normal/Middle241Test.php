<?php


namespace normal;


use Algorithm\normal\m241\DiffWaysToCompute;
use PHPUnit\Framework\TestCase;

class Middle241Test extends TestCase
{
    public function test()
    {
       $result = DiffWaysToCompute::handle("2-1-1");
       var_dump($result);
    }
}