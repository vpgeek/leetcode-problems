<?php
/*
543. Diameter of Binary Tree - Easy

Given the root of a binary tree, return the length of the diameter of the tree.

The diameter of a binary tree is the length of the longest path between any two nodes in a tree. This path may or may not pass through the root.

The length of a path between two nodes is represented by the number of edges between them.

Example 1:

Input: root = [1,2,3,4,5]
Output: 3
Explanation: 3 is the length of the path [4,2,1,3] or [5,2,1,3].

Example 2:

Input: root = [1,2]
Output: 1
 
Constraints:

The number of nodes in the tree is in the range [1, 104].
-100 <= Node.val <= 100

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

    public $diameter = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->maxDepth($root);
        return $this->diameter;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) return 0;
        $leftDepth = $this->maxDepth($root->left);
        $rightDepth = $this->maxDepth($root->right);
        $this->diameter = max($this->diameter, $leftDepth + $rightDepth);
        return max($leftDepth, $rightDepth) + 1;
    }
}


$root = new TreeNode(1);
// $root->left = new TreeNode(2);
// $root->right = new TreeNode(3);
// $root->left->left = new TreeNode(4);
// $root->left->right = new TreeNode(5);

$s = new Solution();
echo $s->diameterOfBinaryTree($root);
