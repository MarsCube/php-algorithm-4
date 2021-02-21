<?php


namespace Algorithm\normal\m889;


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

    function __construct($value)
    {
        $this->val = $value;
    }
}