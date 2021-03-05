<?php


namespace normal;


use Algorithm\normal\m443\Compress;
use PHPUnit\Framework\TestCase;

class Middle443Test extends TestCase
{
    public function test()
    {
        $chars = ["a", "a", "b", "b", "c", "c", "c"];
        $result = Compress::handle($chars);
        $this->assertEquals(["a", "2", "b", "2", "c", "3"], array_slice($chars, 0, $result));

        $chars = ["a", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b"];
        $result = Compress::handle($chars);
        $this->assertEquals(["a", "b", "1", "2"], array_slice($chars, 0, $result));

        $chars = ["a"];
        $result = Compress::handle($chars);
        $this->assertEquals(["a"], array_slice($chars, 0, $result));

        $chars = ["a", "a", "a", "b", "b", "a", "a"];
        $result = Compress::handle($chars);
        $this->assertEquals(["a", "3", "b", "2", "a", "2"], array_slice($chars, 0, $result));
    }
}