<?php


namespace Algorithm\normal\h460;

/**
 * LFU节点
 *
 * Class LFUNode
 * @package Algorithm\normal\h460
 */
class LFUNode
{
    public $key;
    public $value;
    public $freq;

    public function __construct($key, $value, $freq)
    {
        $this->key = $key;
        $this->value = $value;
        $this->freq = $freq;
    }
}