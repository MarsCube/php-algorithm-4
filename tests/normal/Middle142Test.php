<?php


namespace normal;


use Algorithm\normal\m142\DetectCycle;
use Algorithm\normal\m142\ListNode;
use PHPUnit\Framework\TestCase;

class Middle142Test extends TestCase
{
    public function test()
    {
        $node1 = new ListNode(3);
        $node2 = new ListNode(2);
        $node3 = new ListNode(0);
        $node4 = new ListNode(4);
        $node1->next = $node2;
        $node2->next = $node3;
        $node3->next = $node4;
        $node4->next = $node2;
        $result = DetectCycle::handle($node1);
        $this->assertEquals(2, $result->val);
    }
}