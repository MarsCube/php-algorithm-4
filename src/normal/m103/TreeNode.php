<?php


namespace Algorithm\normal\m103;


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

    function __construct($value)
    {
        $this->val = $value;
    }
}