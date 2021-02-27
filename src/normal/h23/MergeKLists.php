<?php


namespace Algorithm\normal\h23;

/**
 * 合并K个升序链表
 *
 * 给你一个链表数组，每个链表都已经按升序排列。
 * 请你将所有链表合并到一个升序链表中，返回合并后的链表。
 *
 * Class MergeKLists
 * @package Algorithm\normal\h23
 */
class MergeKLists
{
    /**
     * @var ListNode[]
     */
    private static $minHeap = [];

    /**
     * @var int 堆大小
     */
    private static $length = 0;

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    public static function handle(array $lists): ListNode
    {
        // 自实现堆
        self::buildMinHeap($lists);
        $sentry = new ListNode();
        $pre = $sentry;
        while (self::$length > 0) {
            $node = self::$minHeap[0];
            $pre->next = $node;
            $pre = $node;
            if ($node->next) {
                self::$minHeap[0] = $node->next;
            } else {
                self::$minHeap[0] = self::$minHeap[--self::$length];
            }
            self::bubbling(0);
        }
        return $sentry->next;
    }


    /**
     * 构造最小堆
     *
     * @param ListNode[] $lists
     */
    private static function buildMinHeap(array &$lists)
    {
        self::$minHeap = [];
        self::$length = 0;
        foreach ($lists as $list) {
            if ($list) {
                self::$minHeap[self::$length++] = $list;
            }
        }
        for ($i = intdiv(self::$length, 2) - 1; $i >= 0; $i--) {
            self::bubbling($i);
        }
    }

    /**
     * 将小的冒上去
     *
     * @param Integer $index
     */
    private static function bubbling(int $index)
    {
        $node = self::$minHeap[$index];
        while ($index * 2 + 1 < self::$length) {
            $next_index = $index * 2 + 1;
            if ($next_index + 1 < self::$length) {
                $next_index = self::$minHeap[$next_index]->val < self::$minHeap[$next_index + 1]->val ? $next_index : $next_index + 1;
            }
            if ($node->val <= self::$minHeap[$next_index]->val) {
                break;
            }
            self::$minHeap[$index] = self::$minHeap[$next_index];
            $index = $next_index;
        }
        self::$minHeap[$index] = $node;
    }
}