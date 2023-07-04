/*
230. Kth Smallest Element in a BST - Medium

Approach II - Recursive solution

Given the root of a binary search tree, and an integer k, return the kth smallest value (1-indexed) of all the values of the nodes in the tree.

Example 1:

Input: root = [3,1,4,null,2], k = 1
Output: 1

Example 2:

Input: root = [5,3,6,2,4,null,null,1], k = 3
Output: 3

Constraints:

The number of nodes in the tree is n.
1 <= k <= n <= 104
0 <= Node.val <= 104

Follow up: If the BST is modified often (i.e., we can do insert and delete operations) and you need to find the kth smallest frequently, how would you optimize?

*/

/**
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */

import java.util.ArrayList;
import java.util.List;

 /**
  * Definition for a binary tree node.
  */
class TreeNode {
    int val;
    TreeNode left;
    TreeNode right;
    TreeNode() {}
    TreeNode(int val) { this.val = val; }
    TreeNode(int val, TreeNode left, TreeNode right) {
        this.val = val;
        this.left = left;
        this.right = right;
    }
}
 
class Solution {
    public int kthSmallest(TreeNode root, int k) {
        List<Integer> list = new ArrayList<>();
        inorderTraversal(root, list);
        return list.get(k-1);
    }

    public void inorderTraversal(TreeNode root, List<Integer> list) {
        if (root == null) return;
        inorderTraversal(root.left, list);
        list.add(root.val);
        inorderTraversal(root.right, list);
    }

     public static void main(String[] args) {
         TreeNode root = new TreeNode(3);
         root.left = new TreeNode(1);
         root.right = new TreeNode(4);
         root.left.right = new TreeNode(2);
 
         Solution s = new Solution();
         System.out.println(s.kthSmallest(root, 3));
     }
 }
 