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
        return max($this->maxDepth($root->left), $this->maxDepth($root->right)) + 1;
    }
}

$a1 = new TreeNode(3);
$a2 = new TreeNode(9);
$a3 = new TreeNode(20);
$a4 = new TreeNode(15);
$a5 = new TreeNode(7);
$a1->left = $a2;
$a1->right = $a3;
$a3->left = $a4;
$a3->right = $a5;

$sol = new Solution();
echo $sol->maxDepth($a1);
