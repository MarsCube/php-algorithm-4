<?php


namespace normal;


use Algorithm\normal\m287\FindDuplicate;
use PHPUnit\Framework\TestCase;

class Middle287Test extends TestCase
{
    public function test() {
        $result = FindDuplicate::handle([1,3,4,2,2]);
        var_dump($result);
    }
}