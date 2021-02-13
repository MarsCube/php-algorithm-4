<?php


namespace Algorithm\normal\m173;

use SplStack;

/**
 * 二叉搜索树迭代器
 *
 * Class BSTIterator
 * @package Algorithm\normal\m173
 */
class BSTIterator
{
    private $stack;

    /**
     * @param TreeNode $root
     */
    function __construct(TreeNode $root)
    {
        $this->stack = new SplStack();
        while ($root) {
            $this->stack->push($root);
            $root = $root->left;
        }
    }

    /**
     * @return Integer
     */
    function next(): int
    {
        $result = $this->stack->pop();
        if ($result->right) {
            $node = $result->right;
            while ($node) {
                $this->stack->push($node);
                $node = $node->left;
            }
        }
        return $result->val;
    }

    /**
     * @return Boolean
     */
    function hasNext(): bool
    {
        return !$this->stack->isEmpty();
    }
}