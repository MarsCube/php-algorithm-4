<?php


namespace normal;


use Algorithm\normal\LongestPalindrome;
use PHPUnit\Framework\TestCase;

class Middle5Test extends TestCase
{
    public function test() {
       $result = LongestPalindrome::handle("cbbd");
       $this->assertEquals('bb', $result);
    }
}