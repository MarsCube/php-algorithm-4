<?php


namespace Algorithm\normal\m445;


class ListNode
{
    public $val = 0;

    /**
     * @var ListNode
     */
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}