<?php
/*
100. Same Tree - Easy

Given the roots of two binary trees p and q, write a function to check if they are the same or not.

Two binary trees are considered the same if they are structurally identical, and the nodes have the same value.

Example 1:

Input: p = [1,2,3], q = [1,2,3]
Output: true

Example 2:

Input: p = [1,2], q = [1,null,2]
Output: false

Example 3:

Input: p = [1,2,1], q = [1,1,2]
Output: false

Constraints:

The number of nodes in both trees is in the range [0, 100].
-104 <= Node.val <= 104

*/

/**
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(n) 
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        if ($p == null && $q == null) return true;
        if ($p == null || $q == null) return false;
        return ($p->val == $q->val) && $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
    }
}

$root1 = new TreeNode(1, new TreeNode(2), new TreeNode(3));
$root2 = new TreeNode(1, new TreeNode(2), new TreeNode(3));

$s = new Solution();
var_dump($s->isSameTree($root1, $root2));
