<?php


namespace Algorithm\normal\m61;

/**
 * 旋转链表
 *
 * 给定一个链表，旋转链表，将链表每个节点向右移动 k 个位置，其中 k 是非负数。
 *
 * Class RotateRight
 * @package Algorithm\normal\m61
 */
class RotateRight
{
    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    public static function handle(ListNode $head, int $k): ListNode
    {
        // 获取长度，首尾相连
        $length = 1;
        $index = $head;
        while ($index->next) {
            $length++;
            $index = $index->next;
        }
        // 首尾相连
        $index->next = $head;
        // 获取要断开的点
        $k = $length - $k % $length;
        $index = $head;
        while ($k > 1) {
            $index = $index->next;
            $k--;
        }
        $result = $index->next;
        $index->next = null;
        return $result;
    }
}