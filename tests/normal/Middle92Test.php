<?php


namespace normal;


use Algorithm\normal\m92\ListNode;
use Algorithm\normal\m92\ReverseBetween;
use PHPUnit\Framework\TestCase;

class Middle92Test extends TestCase
{
    public function test() {
        $node1 = new ListNode(5);
        $node2 = new ListNode(4, $node1);
        $node3 = new ListNode(3, $node2);
        $node4 = new ListNode(2, $node3);
        $node5 = new ListNode(1, $node4);
        ReverseBetween::handle($node5, 1, 1);
        $this->assertTrue(true);
    }
}