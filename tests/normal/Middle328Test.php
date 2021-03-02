<?php


namespace normal;


use Algorithm\normal\m328\ListNode;
use Algorithm\normal\m328\OddEvenList;
use PHPUnit\Framework\TestCase;

class Middle328Test extends TestCase
{
    public function test()
    {
        $node5 = new ListNode(5);
        $node4 = new ListNode(4, $node5);
        $node3 = new ListNode(3, $node4);
        $node2 = new ListNode(2, $node3);
        $node1 = new ListNode(1, $node2);
        $result = OddEvenList::handle($node1);
        $this->assertTrue(true);
        var_dump($result);
    }
}