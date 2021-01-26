<?php


namespace Algorithm\normal\m148;

/**
 * 排序链表
 *
 * 给你链表的头结点 head ，请将其按 升序 排列并返回 排序后的链表 。
 *
 * 输入：head = [4,2,1,3]
 * 输出：[1,2,3,4]
 *
 * Class SortList
 * @package Algorithm\normal\m148
 */
class SortList
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public static function handle(ListNode $head): ListNode
    {
        // 链表最适合归并。
        // 正归并需要函数栈，时间复杂度不是O（1），逆归并实现下
        // 先来个哨兵，避免每趟头部变化
        $sentry = new ListNode(0, $head);
        // 获取下链表长度
        $length = self::getLength($head);

        // 每段长度2倍变大，就近的两段进行merge
        for ($sub_length = 1; $sub_length < $length; $sub_length *= 2) {
            // 每遍开始前更新pre
            $pre = $sentry;
            // 链表的第一个节点
            $cur_node = $sentry->next;
            while ($cur_node) {
                // 要参与合并的第一段头
                // 因为要截断，所以找前驱节点
                // 找到要merge的两段链表的最后两个节点
                self::findLengthEndNode($cur_node, $sub_length, $end1, $end2);
                $head1 = $cur_node;
                // 只有一段，连起来停止归并
                if ($end1 == null || $end1->next == null) {
                    $pre->next = $head1;
                    break;
                }
                $head2 = $end1->next;
                $end1->next = null;
                // 第二段只有一半
                if ($end2 == null) {
                    $next = null;
                } else {
                    $next = $end2->next;
                    $end2->next = null;
                }

                self::merge($head1, $head2, $start, $end, $sub_length);

                // merge后的链表接到pre，pre更新成merge后链表的最后一个节点
                $pre->next = $start;
                $pre = $end;
                // 处理下一组归并
                $cur_node = $next;
            }

        }
        return $sentry->next;
    }

    /**
     * 获取链表长度
     *
     * @param ListNode $head
     * @return int
     */
    private static function getLength(ListNode $head): int
    {
        $result = 0;
        while ($head) {
            $result++;
            $head = $head->next;
        }
        return $result;
    }

    /**
     * 找node节点 length长度之后的节点
     *
     * @param ListNode $node
     * @param int $length
     * @param $end1
     * @param $end2
     */
    private static function findLengthEndNode(ListNode $node, int $length, &$end1, &$end2)
    {
        // 先来个哨兵，避免头部变化
        if ($length == 1) {
            $end1 = $node;
            $end2 = $node->next;
            return;
        }
        $sentry = new ListNode(0, $node);
        $end1 = $end2 = $sentry;
        for ($i = 0; $i < $length && $end1; $i++) {
            $end1 = $end1->next;
            if ($end2 && $end2->next) {
                $end2 = $end2->next->next;
            }
        }
    }

    /**
     * merge链表，并吐出表头表位
     *
     * @param ListNode $head1
     * @param ListNode $head2
     * @param $start
     * @param $end
     */
    private static function merge(ListNode $head1, ListNode $head2, &$start, &$end, $sub_length) {
        // 先来个哨兵，避免头部变化
        $sentry = new ListNode(0);
        $index = $sentry;
        while ($head1 && $head2) {
            if ($head1->val <= $head2->val) {
                $index->next = $head1;
                $head1 = $head1->next;
            } else {
                $index->next = $head2;
                $head2 = $head2->next;
            }
            $index = $index->next;
        }
        if ($head1) {
            $index->next = $head1;
        }
        if ($head2) {
            $index->next = $head2;
        }
        while ($index->next) {
            $index = $index->next;
        }
        $end = $index;
        $start = $sentry->next;
    }
}