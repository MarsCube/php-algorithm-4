<?php


namespace Algorithm\normal\h895;

use SplStack;

/**
 * 最大频率栈
 *
 * 实现 FreqStack，模拟类似栈的数据结构的操作的一个类。
 * FreqStack有两个函数：
 * push(int x)，将整数x推入栈中。
 * pop()，它移除并返回栈中出现最频繁的元素。
 * 如果最频繁的元素不只一个，则移除并返回最接近栈顶的元素。
 *
 * Class FreqStack
 * @package Algorithm\normal\h895
 */
class FreqStack
{
    /**
     * @var array 栈中每个元素出现的频率
     */
    private $val_freq_map;

    /**
     * @var SplStack[] 每个频率的栈 下标为 0 代表 频率为1
     */
    private $freq_stack;

    /**
     * @var int 栈中最大的频率
     */
    private $max_freq;

    /**
     */
    function __construct()
    {
        $this->val_freq_map = [];
        $this->freq_stack = [];
        $max_freq = 0;
    }

    /**
     * @param Integer $x
     * @return void
     */
    function push(int $x)
    {
        if (!isset($this->val_freq_map[$x])) {
            $this->val_freq_map[$x] = 0;
        }
        $this->val_freq_map[$x]++;
        $val_freq = $this->val_freq_map[$x];
        // 更新最大频率
        $this->max_freq = max($val_freq, $this->max_freq);
        // 加入频率栈
        if (!isset($this->freq_stack[$val_freq - 1])) {
            $this->freq_stack[$val_freq - 1] = new SplStack();
        }
        $this->freq_stack[$val_freq - 1]->push($x);
    }

    /**
     * @return Integer
     */
    function pop(): int
    {
        $result = $this->freq_stack[$this->max_freq - 1]->pop();
        $this->val_freq_map[$result]--;
        if ($this->freq_stack[$this->max_freq - 1]->isEmpty()) {
            $this->max_freq--;
        }
        return $result;
    }
}