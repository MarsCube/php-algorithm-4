<?php


namespace Algorithm\normal\m98;


class TreeNode
{
    public $val = null;

    /**
     * @var TreeNode
     */
    public $left = null;

    /**
     * @var TreeNode
     */
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}