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
 * Definition for singly-linked list.
 */
class ListNode {
    int val;
    ListNode next;
    ListNode(int val) {
        this.val = val;
        this.next = null;
    }
}

class Solution {

    public ListNode reverseList(ListNode head) {
        ListNode prev = null;
        ListNode current = head;
        while (current != null) {
            ListNode next = current.next;
            current.next = prev;
            prev = current;
            current = next;
        }
        return prev;
    }

    public ListNode reverseListRecursive(ListNode head, ListNode prev) {
        ListNode current = head;
        if (current == null) return prev;
        ListNode next = current.next;
        current.next = prev;
        return reverseListRecursive(next, current);
    }

    public void printList(ListNode head) {
        while (head != null) {
            System.out.print(head.val + " ");
            head = head.next;
        }
    }

    public void printListRecursive(ListNode head) {
        if (head == null) return;
        System.out.print(head.val + " ");
        printListRecursive(head.next);
    }

    public static void main(String[] args) {
        ListNode head = new ListNode(1);
        ListNode node1 = new ListNode(2);
        ListNode node2 = new ListNode(3);
        ListNode node3 = new ListNode(4);
        ListNode node4 = new ListNode(5);

        head.next = node1;
        node1.next = node2;
        node2.next = node3;
        node3.next = node4;

        Solution s = new Solution();
        s.printList(head);
        ListNode reverseList = s.reverseList(head);
        System.out.println();
        s.printList(reverseList);

        // recursive callback
        // s.printListRecursive(head);
        // ListNode reverseList = s.reverseListRecursive(head, null);
        // System.out.println();
        // s.printListRecursive(reverseList);
    }

}