<?php


namespace Algorithm\normal\s617;


class TreeNode
{
    public $val = null;

    /**
     * @var TreeNode
     */
    public $left;

    /**
     * @var TreeNode
     */
    public $right;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}