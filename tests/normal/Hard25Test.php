<?php


namespace normal;


use Algorithm\normal\h25\ListNode;
use Algorithm\normal\h25\ReverseKGroup;
use PHPUnit\Framework\TestCase;

class Hard25Test extends TestCase
{
    public function test()
    {
        $node1 = new ListNode(5);
        $node2 = new ListNode(4, $node1);
        $node3 = new ListNode(3, $node2);
        $node4 = new ListNode(2, $node3);
        $node5 = new ListNode(1, $node4);
        ReverseKGroup::handle($node5, 2);
        $this->assertTrue(true);
    }

}