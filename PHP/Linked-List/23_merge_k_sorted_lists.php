<?php
/*
23. Merge k Sorted Lists - Hard

You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.

Merge all the linked-lists into one sorted linked-list and return it.

Example 1:

Input: lists = [[1,4,5],[1,3,4],[2,6]]
Output: [1,1,2,3,4,4,5,6]
Explanation: The linked-lists are:
[
  1->4->5,
  1->3->4,
  2->6
]
merging them into one sorted list:
1->1->2->3->4->4->5->6

Example 2:

Input: lists = []
Output: []
Example 3:

Input: lists = [[]]
Output: []
 

Constraints:

k == lists.length
0 <= k <= 104
0 <= lists[i].length <= 500
-104 <= lists[i][j] <= 104
lists[i] is sorted in ascending order.
The sum of lists[i].length will not exceed 104.
*/

/**
 * Big O Analysis
 * 
 * Time Complexity - O(n logk), k = no of linked list, n = total nodes in all lists, inserting into priority queue will be logk, and we'll insert n nodes max
 * Space Complexity - O(k), k = no of linked list, at any point of time, there will be max k nodes will present in queue
 * 
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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $dummy = new ListNode();
        $current = $dummy;

        // create priority queue as min-heap
        $pq = new SplPriorityQueue();

        // add all the head nodes from the lists
        foreach ($lists as $list) {
            if ($list != null) {
                $pq->insert($list, -$list->val);
            }
        }

        // merge the lists
        while (! $pq->isEmpty()) {
            $minNode = $pq->extract();
            $current->next = $minNode;
            $current = $current->next;

            if ($minNode->next != null) {
                $pq->insert($minNode->next, -$minNode->next->val);
            }
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


$lists = [
    new ListNode(1, new ListNode(4, new ListNode(5))),
    new ListNode(1, new ListNode(3, new ListNode(4))),
    new ListNode(2, new ListNode(6)),
];

$s = new Solution();
$mergedList = $s->mergeKLists($lists);
$s->printList($mergedList);
