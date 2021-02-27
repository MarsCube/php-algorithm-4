<?php


namespace normal;


use Algorithm\normal\h23\ListNode;
use Algorithm\normal\h23\MergeKLists;
use PHPUnit\Framework\TestCase;

class Hard23Test extends TestCase
{
    public function test()
    {
        $nodeList = [
            [-8, -7, -6, -3, -2, -2, 0, 3],
            [-10, -6, -4, -4, -4, -2, -1, 4],
            [-10, -9, -8, -8, -6],
            [-10, 0, 4]
        ];
        $lists = [];
        foreach ($nodeList as $listNode) {
            $head = new ListNode();
            $pre = $head;
            foreach ($listNode as $node) {
                $pre->next = new ListNode($node);
                $pre = $pre->next;
            }
            $lists[] = $head->next;
        }
        $result = MergeKLists::handle($lists);
        $this->assertTrue(true);
    }
}