<?php


namespace Algorithm\normal\h212;


class Node
{
    /**
     * @var bool
     */
    public $is_string;

    /**
     * @var Node[]
     */
    public $next;

    public function construct()
    {
        $this->is_string = false;
        $this->next = [];
    }
}