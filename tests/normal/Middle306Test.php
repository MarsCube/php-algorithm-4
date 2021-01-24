<?php


namespace normal;


use Algorithm\normal\m306\IsAdditiveNumber;
use PHPUnit\Framework\TestCase;

class Middle306Test extends TestCase
{
    public function test() {
        $result = IsAdditiveNumber::handle('1203');
        $this->assertFalse($result);
    }
}