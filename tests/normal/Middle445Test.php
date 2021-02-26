<?php


namespace normal;


use Algorithm\normal\m445\ListNode;
use Algorithm\normal\m445\AddTwoNumbers;
use PHPUnit\Framework\TestCase;

class Middle445Test extends TestCase
{
    public function test() {
        $node1 = new ListNode(7);
        $node2 = new ListNode(2);
        $node3 = new ListNode(4);
        $node4 = new ListNode(3);
        $node1->next = $node2;
        $node2->next = $node3;
        $node3->next = $node4;
        $node5 = new ListNode(5);
        $node6 = new ListNode(6);
        $node7 = new ListNode(4);
        $node5->next = $node6;
        $node6->next = $node7;
        $result = AddTwoNumbers::handle($node1, $node5);
        $this->assertEquals(7, $result->val);
    }
}