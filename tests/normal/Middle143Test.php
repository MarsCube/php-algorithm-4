<?php


namespace normal;


use Algorithm\normal\m143\ListNode;
use Algorithm\normal\m143\ReorderList;
use PHPUnit\Framework\TestCase;

class Middle143Test extends TestCase
{
    public function test()
    {
        $node5 = new ListNode(5);
        $node4 = new ListNode(4, $node5);
        $node3 = new ListNode(3, $node4);
        $node2 = new ListNode(2, $node3);
        $node1 = new ListNode(1, $node2);
        ReorderList::handle($node1);
        $this->assertTrue(true);
    }
}