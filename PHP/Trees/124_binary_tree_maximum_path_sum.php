<?php
/*
124. Binary Tree Maximum Path Sum - Hard

A path in a binary tree is a sequence of nodes where each pair of adjacent nodes in the sequence has an edge connecting them. A node can only appear in the sequence at most once. Note that the path does not need to pass through the root.

The path sum of a path is the sum of the node's values in the path.

Given the root of a binary tree, return the maximum path sum of any non-empty path.

Example 1:
Input: root = [1,2,3]
Output: 6
Explanation: The optimal path is 2 -> 1 -> 3 with a path sum of 2 + 1 + 3 = 6.

Example 2:
Input: root = [-10,9,20,null,null,15,7]
Output: 42
Explanation: The optimal path is 15 -> 20 -> 7 with a path sum of 15 + 20 + 7 = 42.

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

    public $maxPathSum = PHP_INT_MIN;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSum($root) {
        $this->maxPathSumHelper($root);
        return $this->maxPathSum;
    }

    function maxPathSumHelper($root) {
        if ($root == null) return 0;
        $leftPathSum = max(0, $this->maxPathSumHelper($root->left));
        $rightPathSum = max(0, $this->maxPathSumHelper($root->right));
        $currentPathSum = $root->val + $leftPathSum + $rightPathSum;
        $this->maxPathSum = max($this->maxPathSum, $currentPathSum);
        return $root->val + max($leftPathSum, $rightPathSum);
    }
}

$root = new TreeNode(-10);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);

$s = new Solution();
echo $s->maxPathSum($root);
