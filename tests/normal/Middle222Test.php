<?php


namespace normal;


use Algorithm\normal\m222\CountNodes;
use Algorithm\normal\m222\TreeNode;
use PHPUnit\Framework\TestCase;

class Middle222Test extends TestCase
{
    public function test() {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(1);
        $node3 = new TreeNode(1);
        $node4 = new TreeNode(1, $node2, $node3);
        $node5 = new TreeNode(1, $node1);
        $node6 = new TreeNode(1, $node4, $node5);
        $result = CountNodes::handle($node6);
        $this->assertEquals(6, $result);
    }
}