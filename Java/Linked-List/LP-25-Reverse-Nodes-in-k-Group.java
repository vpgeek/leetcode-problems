/*
25. Reverse Nodes in k-Group - Hard

Given the head of a linked list, reverse the nodes of the list k at a time, and return the modified list.

k is a positive integer and is less than or equal to the length of the linked list. If the number of nodes is not a multiple of k then left-out nodes, in the end, should remain as it is.

You may not alter the values in the list's nodes, only nodes themselves may be changed.

Example 1:
Input: head = [1,2,3,4,5], k = 2
Output: [2,1,4,3,5]

Example 2:
Input: head = [1,2,3,4,5], k = 3
Output: [3,2,1,4,5]

Constraints:

The number of nodes in the list is n.
1 <= k <= n <= 5000
0 <= Node.val <= 1000
 
Follow-up: Can you solve the problem in O(1) extra memory space?
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
    public ListNode reverseKGroup(ListNode head, int k) {
        ListNode dummy = new ListNode();
        dummy.next = head;
        ListNode prevGroup = dummy;
        ListNode nextGroup = head;
        
        while (true) {
            ListNode curr = nextGroup;
            for (int i=0; i<k; i++) {
                if (curr == null) {
                    // less than k nodes, so return
                    return dummy.next;
                }
                curr = curr.next;
            }

            // reverse the group of k nodes
            ListNode prev = null;
            ListNode current = nextGroup;
            for (int i=0; i<k; i++) {
                ListNode next = current.next;
                current.next = prev;
                prev = current;
                current = next;
            }

            // connect the prev & next group pointers
            prevGroup.next = prev;
            nextGroup.next = current;
            prevGroup = nextGroup;
            nextGroup = current;
        }
    }

    public void printList(ListNode head) {
        while (head != null) {
            System.out.print(head.val + " ");
            head = head.next;
        }
    }

    public static void main(String[] args) {
        ListNode list = new ListNode(1);
        list.next = new ListNode(2);
        list.next.next = new ListNode(3);
        list.next.next.next = new ListNode(4);
        list.next.next.next.next = new ListNode(5);

        Solution s = new Solution();
        s.printList(list);
        list = s.reverseKGroup(list, 2);
        System.out.println();
        s.printList(list);
    }
}

