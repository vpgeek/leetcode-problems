<?php
/*
143. Reorder List - Medium

You are given the head of a singly linked-list. The list can be represented as:

L0 → L1 → … → Ln - 1 → Ln
Reorder the list to be on the following form:

L0 → Ln → L1 → Ln - 1 → L2 → Ln - 2 → …
You may not modify the values in the list's nodes. Only nodes themselves may be changed.

Example 1:
Input: head = [1,2,3,4]
Output: [1,4,2,3]

Example 2:

Input: head = [1,2,3,4,5]
Output: [1,5,2,4,3]

Constraints:

The number of nodes in the list is in the range [1, 5 * 104].
1 <= Node.val <= 1000
*/

/**
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */

/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @return NULL
     */
    function reorderList($head) {

        // find middle
        $slow = $head;
        $fast = $head->next;
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $second = $slow->next;
        $slow->next = null;

        // reverse second half
        $prev = null;
        $current = $second;
        while ($current != null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        // merge first and second half
        $first = $head;
        $second = $prev;
        while ($first != null && $second != null) {
            $tmp1 = $first->next;
            $tmp2 = $second->next;
            $first->next = $second;
            $second->next = $tmp1;
            $first = $tmp1;
            $second = $tmp2;
        }
    }

    /**
     * @param ListNode $head
     * @return null
     */
    function printList($head) {
        while ($head != null) {
            echo $head->val . " ";
            $head = $head->next;
        }
    }
}

$head = new ListNode(1);
$node1 = new ListNode(2);
$node2 = new ListNode(3);
$node3 = new ListNode(4);
$node4 = new ListNode(5);

$head->next = $node1;
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;

$s = new Solution();
$s->printList($head);
$s->reorderList($head);
echo '<br/>';
$s->printList($head);
