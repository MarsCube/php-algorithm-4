<?php


namespace Algorithm\normal\m143;

/**
 * 重排链表
 *
 * 给定一个单链表 L：L0→L1→…→Ln-1→Ln ，
 * 将其重新排列后变为： L0→Ln→L1→Ln-1→L2→Ln-2→…
 *
 * 你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 *
 * Class ReorderList
 * @package Algorithm\normal\m143
 */
class ReorderList
{
    /**
     * @param ListNode $head
     */
    public static function handle(ListNode $head)
    {
        if (!$head) {
            return;
        }
        // 1. 找到中点
        $middle = self::findMiddle($head);
        // 2. 逆序后半段
        $head2 = self::reserve($middle);
        // 3. 合并
        $head = self::merge($head, $head2, $middle);
    }

    /**
     * 找到中点
     *
     * @param ListNode $head
     * @return ListNode
     */
    public static function findMiddle(ListNode $head): ListNode
    {
        $slow = $head;
        $fast = $head->next;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    /**
     * 翻转链表
     *
     * @param ListNode $head
     * @return ListNode
     */
    private static function reserve(ListNode $head): ListNode
    {
        $pre = null;
        while ($head) {
            $next = $head->next;
            $head->next = $pre;
            $pre = $head;
            $head = $next;
        }
        return $pre;
    }

    /**
     * 合并链表
     *
     * @param ListNode $head1
     * @param ListNode $head2
     * @param ListNode $middle
     * @return ListNode
     */
    private static function merge(ListNode $head1, ListNode $head2, ListNode $middle): ListNode
    {
        $head = $head1;
        while ($head1 !== null && $head2 !== $middle) {
            $head1_next = $head1->next;
            $head2_next = $head2->next;
            $head2->next = $head1_next;
            $head1->next = $head2;
            $head1 = $head1_next;
            $head2 = $head2_next;
        }
        return $head;
    }
}