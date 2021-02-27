<?php


namespace Algorithm\normal\m142;


class ListNode
{
    public $val = 0;

    /**
     * @var ListNode
     */
    public $next;

    function __construct($val)
    {
        $this->val = $val;
    }
}