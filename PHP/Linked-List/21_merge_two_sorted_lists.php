<?php
/*
21. Merge Two Sorted Lists - Easy
You are given the heads of two sorted linked lists list1 and list2.

Merge the two lists in a one sorted list. The list should be made by splicing together the nodes of the first two lists.

Return the head of the merged linked list.

Example 1:
Input: list1 = [1,2,4], list2 = [1,3,4]
Output: [1,1,2,3,4,4]

Example 2:
Input: list1 = [], list2 = []
Output: []

Example 3:
Input: list1 = [], list2 = [0]
Output: [0]

Constraints:

The number of nodes in both lists is in the range [0, 50].
-100 <= Node.val <= 100
Both list1 and list2 are sorted in non-decreasing order.
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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {

        $dummy = new ListNode();
        $current = $dummy;

        while ($list1 != null && $list2 != null) {
            if ($list1->val < $list2->val) {
                $current->next = $list1;
                $list1 = $list1->next;
            } else {
                $current->next = $list2;
                $list2 = $list2->next;
            }
            $current = $current->next;
        }

        if ($list1 != null) {
            $current->next = $list1;
        }

        if ($list2 != null) {
            $current->next = $list2;
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

// list 1
$list1 = new ListNode(1);
$list1->next = new ListNode(2);
$list1->next->next = new ListNode(4);

// list 2
$list2 = new ListNode(1);
$list2->next = new ListNode(3);
$list2->next->next = new ListNode(4);

$s = new Solution();
$mergedList = $s->mergeTwoLists($list1, $list2);
$s->printList($mergedList);
