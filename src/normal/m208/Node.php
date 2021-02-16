<?php


namespace Algorithm\normal\m208;


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