<?php


namespace Algorithm\normal\m109;

/**
 * 有序链表转换二叉搜索树
 *
 * Class SortedListToBST
 * @package Algorithm\normal\m109
 */
class SortedListToBST
{
    /**
     * @param ListNode $head
     * @return TreeNode|null
     */
    public static function handle(ListNode $head)
    {
        if (!$head) {
            return null;
        }
        if (!$head->next) {
            return new TreeNode($head->val);
        }
        $middle = self::findMiddle($head);

        $left = $head;
        $node = $middle->next;
        $middle->next = null;
        $right = $node->next;

        $node->left = self::handle($left);
        $node->right = self::handle($right);
        return $node;
    }

    /**
     * 查找中间节点
     *
     * @param ListNode $head
     * @return ListNode
     */
    private static function findMiddle(ListNode $head): ListNode
    {
        $pre = null;
        $slow = $fast = $head;
        while ($fast && $fast->next) {
            $pre = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $pre;
    }
}