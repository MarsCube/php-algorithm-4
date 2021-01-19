<?php


namespace normal;


use Algorithm\normal\m105\BuildTree;
use PHPUnit\Framework\TestCase;

class Middle105Test extends TestCase
{
    public function test() {
        $result = BuildTree::handle([3,9,20,15,7], [9,3,15,20,7]);
        $this->assertEquals($result->val, 3);
    }
}