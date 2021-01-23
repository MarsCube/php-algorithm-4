<?php


namespace normal;


use Algorithm\normal\m103\TreeNode;
use Algorithm\normal\m103\ZigzagLevelOrder;
use PHPUnit\Framework\TestCase;

class Middle103Test extends TestCase
{
    public function test()
    {
        $node1 = new TreeNode(3);
        $node2 = new TreeNode(9);
        $node3 = new TreeNode(20);
        $node4 = new TreeNode(15);
        $node5 = new TreeNode(7);
        $node1->left = $node2;
        $node1->right = $node3;
        $node3->left = $node4;
        $node3->right = $node5;
        $result = ZigzagLevelOrder::handle($node1);
        $this->assertEquals([[3], [20,9], [15,7]], $result);
    }
}