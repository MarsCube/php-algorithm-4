<?php


namespace normal;


use Algorithm\normal\m93\RestoreIpAddresses;
use PHPUnit\Framework\TestCase;

class Middle93Test extends TestCase
{
    public function test() {
        $result = RestoreIpAddresses::handle("");
        var_dump($result);
    }
}