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
 * Definition for singly-linked list.
 */
class ListNode {
    int val;
    ListNode next;
    ListNode() {}
    ListNode(int val) { this.val = val; }
    ListNode(int val, ListNode next) { this.val = val; this.next = next; }
}

 class Solution {
    public ListNode removeNthFromEnd(ListNode head, int n) {
        // create dummy node to handle edge cases
        ListNode dummy = new ListNode();
        dummy.next = head;

        ListNode slow = dummy;
        ListNode fast = dummy;

        // move fast pointer to n+1 steps ahead
        for (int i=0; i<=n; i++) {
            fast = fast.next;
        }

        // move both pointers until fast pointer reaches end
        while (fast != null) {
            slow = slow.next;
            fast = fast.next;
        }

        // delete target node
        slow.next = slow.next.next;
        
        return dummy.next;
    }

    public void printList(ListNode head) {
        while (head != null) {
            System.out.print(head.val + " ");
            head = head.next;
        }
    }

    public static void main(String[] args) {
        ListNode head = new ListNode(1);
        head.next = new ListNode(2);
        head.next.next = new ListNode(3);
        head.next.next.next = new ListNode(4);
        head.next.next.next.next = new ListNode(5);

        Solution s = new Solution();
        s.printList(head);
        head = s.removeNthFromEnd(head, 2);
        System.out.println();
        s.printList(head);
    }
}
