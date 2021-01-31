<?php


namespace Algorithm\normal\m146;

/**
 * LRU 缓存机制
 *
 * Class LRUCache
 * @package Algorithm\normal\m146
 */
class LRUCache
{
    /**
     * @var LRUNode[]
     */
    private $map;

    /**
     * @var int 容量
     */
    private $capacity;

    /**
     * @var int 当前元素个数
     */
    private $size;

    /**
     * @var LRUNode 头结点
     */
    private $head;

    /**
     * @var LRUNode 尾节点
     */
    private $tail;

    /**
     * 以正整数作为容量 capacity 初始化 LRU 缓存
     *
     * @param Integer $capacity
     */
    function __construct(int $capacity)
    {
        $this->capacity = $capacity;
        $this->map = [];
        $this->head = new LRUNode(0, 0);
        $this->tail = null;
        $this->size = 0;
    }

    /**
     * 如果关键字 key 存在于缓存中，则返回关键字的值，否则返回 -1 。
     *
     * @param Integer $key
     * @return Integer
     */
    function get(int $key): int
    {
        if (!isset($this->map[$key])) {
            return -1;
        }
        $node = $this->map[$key];
        // 把node 移到前面
        $this->moveHead($node);
        return $node->value;
    }

    /**
     * 如果关键字已经存在，则变更其数据值；如果关键字不存在，则插入该组「关键字-值」。
     *
     * @param Integer $key
     * @param Integer $value
     */
    function put(int $key, int $value)
    {
        // 存在
        if (isset($this->map[$key])) {
            $node = $this->map[$key];
            $node->value = $value;
            // 把node 移到前面
            $this->moveHead($node);
            return;
        }
        // 超负载
        if ($this->size == $this->capacity) {
            $this->deleteTail();
        }
        $node = new LRUNode($key, $value);
        $this->map[$key] = $node;
        $this->insertHead($node);
    }

    function moveHead(LRUNode $node)
    {
        $this->deleteNode($node);
        $this->insertHead($node);
    }

    function deleteTail() {
        $node = $this->tail;
        $this->deleteNode($node);
        unset($this->map[$node->key]);

    }

    function insertHead(LRUNode $node) {
        $node->prev = $this->head;
        $node->next = $this->head->next;
        $this->head->next = $node;
        if ($node->next) {
            $node->next->prev = $node;
        } else {
            $this->tail = $node;
        }
        $this->size++;
    }

    function deleteNode(LRUNode $node) {
        $node->prev->next = $node->next;
        if ($node->next) {
            $node->next->prev = $node->prev;
        } else {
            $this->tail = $node->prev;
        }
        $this->size--;
    }
}