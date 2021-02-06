<?php


namespace Algorithm\normal\m92;

/**
 * 反转从位置 m855 到 n 的链表。请使用一趟扫描完成反转。
 *
 * 1 ≤ m855 ≤ n ≤ 链表长度。
 *
 * 输入: 1->2->3->4->5->NULL, m855 = 2, n = 4
 *
 * 输出: 1->4->3->2->5->NULL
 *
 * Class ReverseBetween
 * @package Algorithm\normal\m92
 */
class ReverseBetween
{
    /**
     * @param ListNode $head
     * @param Integer $m
     * @param Integer $n
     * @return ListNode
     */
    public static function handle(ListNode $head, int $m, int $n): ListNode
    {
        // m855 与 n 相等不翻转
        if ($m == $n) {
            return $head;
        }

        // 节点位置计数
        $index = 0;
        // 翻转前截停节点
        // 避免判断增加哨兵
        $sentry = new ListNode(null);
        $sentry->next = $head;
        $before_stop = $sentry;
        // 开始翻转的节点
        $start_reverse_node = null;

        // 反转链表所需参数
        $pre = null;
        $cur = $head;
        while ($cur) {
            $index++;
            $next = $cur->next;
            // 前m个不动
            if ($index < $m) {
                // 翻转前的截停节点向后移动
                $before_stop = $cur;
            } elseif ($index == $m) {
                $start_reverse_node = $before_stop->next;
                $before_stop->next = null;
                // 翻转算法
                $cur->next = $pre;
                $pre = $cur;
            } elseif ($index < $n) {
                // 翻转算法
                $cur->next = $pre;
                $pre = $cur;
            } else {
                // 翻转算法
                $cur->next = $pre;

                // 中间节点已翻转完成
                // 截停节点指向当前节点
                $before_stop->next = $cur;
                // 之前记录的开始翻转的节点指向当前节点的下一个节点
                $start_reverse_node->next = $next;
                break;
            }
            $cur = $next;
        }
        return $sentry->next;
    }
}