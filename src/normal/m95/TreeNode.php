<?php


namespace Algorithm\normal\m95;


class TreeNode
{
    public $val = null;

    /**
     * @var TreeNode|null
     */
    public $left = null;

    /**
     * @var TreeNode|null
     */
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}