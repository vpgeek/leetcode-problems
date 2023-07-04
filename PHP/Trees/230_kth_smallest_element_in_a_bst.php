<?php
/*
230. Kth Smallest Element in a BST - Medium

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
 * Time Complexity -
 * Space Complexity -  
 */

/**
 * Definition for a binary tree node.
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        if ($root == null) return -1;

        $stack = [];
        $current = $root;
        while ($current || $stack) {
            while ($current) {
                array_push($stack, $current);
                $current = $current->left;
            }

            $current = array_pop($stack);
            $k--;
            if ($k == 0) {
                return $current->val;
            }
            $current = $current->right;
        }

        return -1;
    }
}

$root = new TreeNode(3);
$root->left = new TreeNode(1);
$root->right = new TreeNode(4);
$root->left->right = new TreeNode(2);
