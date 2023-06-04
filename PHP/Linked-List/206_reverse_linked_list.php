<?php
/*
206. Reverse Linked List - Easy

Given the head of a singly linked list, reverse the list, and return the reversed list.

Example 1:
Input: head = [1,2,3,4,5]
Output: [5,4,3,2,1]

Example 2:
Input: head = [1,2]
Output: [2,1]

Example 3:
Input: head = []
Output: []
 
Constraints:

The number of nodes in the list is the range [0, 5000].
-5000 <= Node.val <= 5000

Follow up: A linked list can be reversed either iteratively or recursively. Could you implement both?
*/

/**
 * Big O Analysis
 * 
 * Iterative
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 * 
 * Recursive
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */

/**
 * Definition for a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    
    function __construct($val) {
        $this->val = $val;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $prev = null;
        $current = $head;

        while ($current != null) {
            $next = $current->next; // store the next node
            $current->next = $prev; // reverse the pointer
            $prev = $current;
            $current = $next;
        }
        return $prev;
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

    /**
     * @param ListNode $head
     * @param ListNode $prev
     * @return ListNode
     */
    function reverseListRecursive($head, $prev = null) {
        $current = $head;
        if ($current == null) return $prev;
        $next = $current->next;
        $current->next = $prev;
        return $this->reverseListRecursive($next, $current);
    }

    /**
     * @param ListNode $head
     * @return null
     */
    function printListRecursive($head) {
        if ($head == null) return;
        echo $head->val . ' ';
        $this->printListRecursive($head->next);
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
$reversedList = $s->reverseList($head);
echo "<br/>";
$s->printList($reversedList);

// recursive callback
// $s->printListRecursive($head);
// $reversedList = $s->reverseListRecursive($head);
// echo '<br/>';
// $s->printListRecursive($reversedList);
