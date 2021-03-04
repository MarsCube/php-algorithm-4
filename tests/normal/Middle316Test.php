<?php


namespace normal;


use Algorithm\normal\m316\RemoveDuplicateLetters;
use PHPUnit\Framework\TestCase;

class Middle316Test extends TestCase
{
    public function test()
    {
        $this->assertEquals('abc', RemoveDuplicateLetters::handle('bcabc'));
    }
}