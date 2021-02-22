<?php


namespace Algorithm\normal\m143;


class ListNode
{
    public $val = 0;

    /**
     * @var ListNode
     */
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}