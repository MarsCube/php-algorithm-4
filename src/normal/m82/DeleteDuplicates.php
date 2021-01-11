<?php


namespace Algorithm\normal\m82;

/**
 * 给定一个排序链表，删除所有含有重复数字的节点，只保留原始链表中 没有重复出现 的数字。
 *
 * 输入: 1->2->3->3->4->4->5
 * 输出: 1->2->5
 *
 * Class DeleteDuplicates
 * @package Algorithm\normal\m82
 */
class DeleteDuplicates
{
    public static function handle(ListNode $head): ListNode
    {
        // 避免判断，增加一个哨兵
        $sentry = new ListNode(null, $head);
        $pre = $sentry;
        $cur = $head;
        // 是否重复的标识
        $flag = false;
        while ($cur->next) {
            if ($cur->val == $cur->next->val) {
                $flag = true;
            } else {
                // 如果重复，当前节点不要
                if ($flag) {
                    $pre->next = $cur->next;
                } else { // 确定不一样后，再移动 $pre
                    $pre = $cur;
                }
                $flag = false;
            }
            $cur = $cur->next;
        }
        if ($flag) {
            $pre->next = null;
        }
        return $sentry->next;
    }
}