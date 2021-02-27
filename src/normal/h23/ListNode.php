<?php


namespace Algorithm\normal\h23;


class ListNode
{
    public $val = 0;

    /**
     * @var ListNode
     */
    public $next;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}