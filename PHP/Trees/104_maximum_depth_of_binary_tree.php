<?php

/*
104. Maximum Depth of Binary Tree - Easy

Given the root of a binary tree, return its maximum depth.

A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.

Input: root = [3,9,20,null,null,15,7]
Output: 3

          3
        /   \
       9      20
             /  \
            15   7

*/

/**
 * Big O Analysis
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
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     * 
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) return 0;
        $leftDepth = $this->maxDepth($root->left);
        $rightDepth = $this->maxDepth($root->right);
        return max($leftDepth, $rightDepth) + 1;
    }
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);

$s = new Solution();
echo $s->maxDepth($root);
