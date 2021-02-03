<?php


namespace normal;


use Algorithm\normal\m131\Partition;
use PHPUnit\Framework\TestCase;

class Middle131Test extends TestCase
{
    public function test()
    {
        $result = Partition::handle("aab");
        $data = [
            ["a", "a", "b"],
            ["aa", "b"],
        ];
        $this->assertEquals($data, $result);
    }
}