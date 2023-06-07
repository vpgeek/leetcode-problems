<?php
/*
19. Remove Nth Node From End of List - Medium
Given the head of a linked list, remove the nth node from the end of the list and return its head.

Example 1:
Input: head = [1,2,3,4,5], n = 2
Output: [1,2,3,5]

Example 2:
Input: head = [1], n = 1
Output: []

Example 3:
Input: head = [1,2], n = 1
Output: [1]

Constraints:

The number of nodes in the list is sz.
1 <= sz <= 30
0 <= Node.val <= 100
1 <= n <= sz
 
Follow up: Could you do this in one pass?
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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        // create dummy node to handle edge cases
        $dummy = new ListNode();
        $dummy->next = $head;

        $slow = $fast = $dummy;

        // move fast pointer n+1 steps ahead
        for ($i=0; $i<=$n; $i++) {
            $fast = $fast->next;
        }

        // move both pointers until fast pointer reaches end
        while ($fast != null) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        // delete the target node
        $slow->next =$slow->next->next;

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

$list = new ListNode(1);
$list->next = new ListNode(2);
$list->next->next = new ListNode(3);
$list->next->next->next = new ListNode(4);
$list->next->next->next->next = new ListNode(5);

$s = new Solution();
$s->printList($list);
$list = $s->removeNthFromEnd($list, 2);
echo '<br/>';
$s->printList($list);
