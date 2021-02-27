<?php


namespace Algorithm\normal\m142;

/**
 * 环形链表 II
 *
 * 给定一个链表，返回链表开始入环的第一个节点。 如果链表无环，则返回 null。
 *
 * 为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。
 * 如果 pos 是 -1，则在该链表中没有环。注意，pos 仅仅是用于标识环的情况，并不会作为参数传递到函数中。
 *
 * Class DetectCycle
 * @package Algorithm\normal\m142
 */
class DetectCycle
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public static function handle(ListNode $head)
    {
        $slow = $fast = $head;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($fast === $slow) {
                break;
            }
        }
        if (!$fast || !$fast->next) {
            return null;
        }
        // 确定有环，找环口
        $slow = $head;
        while ($fast !== $slow) {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        return $fast;
    }
}