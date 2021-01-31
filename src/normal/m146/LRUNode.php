<?php


namespace Algorithm\normal\m146;

class LRUNode
{
    /**
     * @var int
     */
    public $key;

    /**
     * @var int
     */
    public $value;

    /**
     * @var LRUNode 前驱
     */
    public $prev;

    /**
     * @var LRUNode 后继
     */
    public $next;

    /**
     * LRUNode constructor.
     * @param int $key
     * @param int $value
     */
    public function __construct(int $key, int $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}