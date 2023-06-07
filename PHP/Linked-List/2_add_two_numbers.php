<?php
/*
2. Add Two Numbers - Medium

You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Example 1:
Input: l1 = [2,4,3], l2 = [5,6,4]
Output: [7,0,8]
Explanation: 342 + 465 = 807.

Example 2:
Input: l1 = [0], l2 = [0]
Output: [0]

Example 3:
Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
Output: [8,9,9,9,0,0,0,1]

Constraints:

The number of nodes in each linked list is in the range [1, 100].
0 <= Node.val <= 9
It is guaranteed that the list represents a number that does not have leading zeros.

*/

/**
 * Big O Analysis
 * 
 * Time Complexity - O(max(m,n))
 * Space Complexity - O(max(m,n))
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $dummy = new ListNode();
        $current = $dummy;
        $carry = 0;

        while ($l1 != null || $l2 != null) {
            $n1 = ($l1 != null) ? $l1->val : 0;
            $n2 = ($l2 != null) ? $l2->val : 0;
            $sum = $carry + $n1 + $n2;
            $carry = intval($sum / 10);
            $current->next = new ListNode($sum % 10);
            $current = $current->next;

            if ($l1 != null) {
                $l1 = $l1->next;
            }

            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }

        if ($carry > 0) {
            $current->next = new ListNode($carry);
        }

        return $dummy->next;
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

$l1 = new ListNode(2);
$l1->next = new ListNode(4);
$l1->next->next = new ListNode(3);

$l2 = new ListNode(5);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(4);

$s = new Solution();
$s->printList($l1);
echo '<br/>';
$s->printList($l2);
$l3 = $s->addTwoNumbers($l1, $l2);
echo '<br/>';
$s->printList($l3);
