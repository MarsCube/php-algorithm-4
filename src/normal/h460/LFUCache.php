<?php


namespace Algorithm\normal\h460;


/**
 * LFU 缓存
 *
 * 请你为 最不经常使用（LFU）缓存算法设计并实现数据结构。
 * 实现 LFUCache 类：
 * LFUCache(int capacity) - 用数据结构的容量capacity 初始化对象
 * int get(int key)- 如果键存在于缓存中，则获取键的值，否则返回 -1。
 *
 * void put(int key, int value)- 如果键已存在，则变更其值；如果键不存在，请插入键值对。
 * 当缓存达到其容量时，则应该在插入新项之前，使最不经常使用的项无效。
 * 在此问题中，当存在平局（即两个或更多个键具有相同使用频率）时，应该去除 最久未使用 的键。
 *
 * Class LFUCache
 * @package Algorithm\normal\h460
 */
class LFUCache
{
    /**
     * @var int 最小频率
     */
    private $min_freq;

    /**
     * @var int 最大容量
     */
    private $capacity;

    /**
     * @var int 当前容量
     */
    private $size;

    /**
     * php的map既是list，又是hash
     * @var LFUNode[][] key为频率，value为键值对
     */
    private $freq_table;

    /**
     * @var LFUNode[] key为 key，value为node
     */
    private $data;

    /**
     * @param Integer $capacity
     */
    function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->size = 0;
        $this->data = [];
        $this->freq_table = [];
        $this->min_freq = 0;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get(int $key): int
    {
        if (!isset($this->data[$key])) {
            return -1;
        }
        $node = $this->data[$key];
        // 原有频率map删除该节点
        $this->freqTableDel($node);
        // 判断是否需要更新 min_freq
        if (!isset($this->freq_table[$node->freq]) && $node->freq == $this->min_freq) {
            $this->min_freq++;
        }
        $node->freq++;
        // 新的频率map追加节点
        $this->freqTableAdd($node);
        return $node->value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return void
     */
    function put(int $key, int $value)
    {
        if ($this->capacity == 0) {
            return;
        }
        // 不存在是一种情况
        if (!isset($this->data[$key])) {
            // 超量淘汰
            if ($this->size == $this->capacity) {
                $this->elimination();
            }
            // put
            $this->min_freq = 1;
            $node = new LFUNode($key, $value, $this->min_freq);
            $this->data[$key] = $node;
            $this->freqTableAdd($node);
            $this->size++;
        } else {
            $node = $this->data[$key];
            $node->value = $value;
            $this->freqTableDel($node);
            if (!isset($this->freq_table[$node->freq]) && $node->freq == $this->min_freq) {
                $this->min_freq++;
            }
            $node->freq++;
            $this->freqTableAdd($node);
        }
    }

    /**
     * 淘汰
     */
    private function elimination()
    {
        $node = current($this->freq_table[$this->min_freq]);
        $this->size--;
        unset($this->data[$node->key]);
        unset($this->freq_table[$this->min_freq][$node->key]);
        if (!$this->freq_table[$node->freq]) {
            unset($this->freq_table[$node->freq]);
        }
    }

    /**
     * 频率表新增
     * @param LFUNode $node
     */
    private function freqTableAdd(LFUNode &$node)
    {
        $this->freq_table[$node->freq][$node->key] = $node;
    }

    /**
     * 频率表删除
     *
     * @param LFUNode $node
     */
    private function freqTableDel(LFUNode &$node)
    {
        unset($this->freq_table[$node->freq][$node->key]);
        if (!$this->freq_table[$node->freq]) {
            unset($this->freq_table[$node->freq]);
        }
    }
}