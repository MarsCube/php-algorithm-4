<?php


namespace normal;


use Algorithm\normal\m148\ListNode;
use Algorithm\normal\m148\SortList;
use PHPUnit\Framework\TestCase;

class Middle148Test extends TestCase
{
    public function test() {
        $node3 = new ListNode(5);
        $node1 = new ListNode(0, $node3);
        $node2 = new ListNode(4, $node1);
        $node4 = new ListNode(3, $node2);
        $node5 = new ListNode(-1, $node4);
        $result = SortList::handle($node5);
        var_dump($result);
    }
}