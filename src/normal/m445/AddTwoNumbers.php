<?php


namespace Algorithm\normal\m445;

use SplStack;

/**
 * 两数相加 II
 *
 * 给你两个 非空 链表来代表两个非负整数。数字最高位位于链表开始位置。
 * 它们的每个节点只存储一位数字。将这两数相加会返回一个新的链表。
 *
 * 你可以假设除了数字 0 之外，这两个数字都不会以零开头。
 *
 * 如果输入链表不能修改该如何处理？换句话说，你不能对列表中的节点进行翻转。
 *
 * Class AddTwoNumbers
 * @package Algorithm\normal\m445
 */
class AddTwoNumbers
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public static function handle(ListNode $l1, ListNode $l2): ListNode
    {
        $stack1 = new SplStack();
        $stack2 = new SplStack();
        while ($l1) {
            $stack1->push($l1->val);
            $l1 = $l1->next;
        }
        while ($l2) {
            $stack2->push($l2->val);
            $l2 = $l2->next;
        }
        $carry = 0;
        $result = null;
        while (!$stack1->isEmpty() || !$stack2->isEmpty()) {
            $num1 = $stack1->isEmpty() ? 0 : $stack1->pop();
            $num2 = $stack2->isEmpty() ? 0 : $stack2->pop();
            $num = $num1 + $num2 + $carry;
            $carry = 0;
            if ($num >= 10) {
                $num = $num % 10;
                $carry = 1;
            }
            $node = new ListNode($num);
            $node->next = $result;
            $result = $node;
        }
        if ($carry) {
            $node = new ListNode($carry);
            $node->next = $result;
            $result = $node;
        }
        return $result;
    }
}