<?php


namespace normal;


use Algorithm\normal\m82\DeleteDuplicates;
use Algorithm\normal\m82\ListNode;
use PHPUnit\Framework\TestCase;

class Middle82Test extends TestCase
{
    public function test() {
        $node1 = new ListNode(5);
        $node2 = new ListNode(4, $node1);
        $node3 = new ListNode(4, $node2);
        $node4 = new ListNode(3, $node3);
        $node5 = new ListNode(3, $node4);
        $node6 = new ListNode(2, $node5);
        $node7 = new ListNode(1, $node6);
        DeleteDuplicates::handle($node7);
    }
}