<?php


namespace Algorithm\normal\h25;

/**
 * 给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
 * k 是一个正整数，它的值小于或等于链表的长度。
 * 如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
 * 
 * 给你这个链表：1->2->3->4->5

 * 当  k  = 2 时，应当返回: 2->1->4->3->5

 * 当  k  = 3 时，应当返回: 3->2->1->4->5

 * 
 * Class ReverseKGroup
 * @package Algorithm\normal\h25
 */
class ReverseKGroup
{
    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    public static function handle(ListNode $head, int $k): ListNode
    {
        $index = 0;
        // 反转链表所需参数
        $pre = null;
        $cur = $head;

        // 哨兵
        $sentry = new ListNode(null);
        // 前一段的翻转开始
        $pre_part_start = $sentry;
        // 记录每段翻转的开始
        $part_start = $head;

        $pre = null;
        while ($cur) {
            // index 和 k 相等时，说明开始下一组
            if ($index == $k) {
                // 段段相接
                $pre_part_start->next = $pre;
                $pre_part_start = $part_start;
                $part_start = $cur;
                $pre = $cur;
                $index = 0;
            } else {
                // 正常翻转
                $next = $cur->next;
                $cur->next = $pre;
                $pre = $cur;
                $cur = $next;
                $index++;
            }
        }

        // 段段相接
        if ($index == $k) {
            $pre_part_start->next = $pre;
            $part_start->next = $cur;
        }
        if ($index != 0) {
            // 需要再翻回来
            $cur = $pre;
            $part_start->next = null;
            $pre = null;
            while ($cur) {
                $next = $cur->next;
                $cur->next = $pre;
                $pre = $cur;
                $cur = $next;
            }
            $pre_part_start->next = $pre;
        }
        print_r($sentry->next);die();
        return $sentry->next;
    }
}