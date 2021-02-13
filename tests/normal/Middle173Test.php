<?php


namespace normal;


use Algorithm\normal\m173\BSTIterator;
use Algorithm\normal\m173\TreeNode;
use PHPUnit\Framework\TestCase;

class Middle173Test extends TestCase
{
    public function test()
    {
        $node20 = new TreeNode(20);
        $node9 = new TreeNode(9);
        $node3 = new TreeNode(3);
        $node15 = new TreeNode(15, $node9, $node20);
        $root = new TreeNode(7, $node3, $node15);
        $iterator = new BSTIterator($root);
        $this->assertEquals(3, $iterator->next());
        $this->assertEquals(7, $iterator->next());

        $this->assertTrue($iterator->hasNext());
        $this->assertEquals(9, $iterator->next());
        $this->assertTrue($iterator->hasNext());
        $this->assertEquals(15, $iterator->next());
        $this->assertTrue($iterator->hasNext());
        $this->assertEquals(20, $iterator->next());

        $this->assertFalse($iterator->hasNext());
    }
}