<?php


namespace Algorithm\normal\m328;

/**
 * 奇偶链表
 *
 * 给定一个单链表，把所有的奇数节点和偶数节点分别排在一起。
 * 请注意，这里的奇数节点和偶数节点指的是节点编号的奇偶性，而不是节点的值的奇偶性。
 *
 * 请尝试使用原地算法完成。你的算法的空间复杂度应为 O(1)，时间复杂度应为 O(nodes)，nodes 为节点总数。
 *
 * Class OddEvenList
 * @package Algorithm\normal\m328
 */
class OddEvenList
{
    /**
     * @param ListNode $head
     * @return mixed
     */
    public static function handle(ListNode $head)
    {
        if (!$head) {
            return null;
        }
        $odd = $head;
        $even = $head->next;
        $even_head = $even;
        while ($even && $even->next) {
            $odd->next = $even->next;
            $odd = $odd->next;
            $even->next = $odd->next;
            $even = $even->next;
        }
        $odd->next = $even_head;
        return $head;
    }
}