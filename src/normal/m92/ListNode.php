<?php


namespace Algorithm\normal\m92;


class ListNode
{
    public $val = 0;
    /**
     * @var ListNode|null
     */
    public $next = null;

    function __construct($val, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
