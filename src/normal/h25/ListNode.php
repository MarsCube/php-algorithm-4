<?php


namespace Algorithm\normal\h25;


class ListNode
{
    public $val = 0;

    /**
     * @var ListNode|null
     */
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}