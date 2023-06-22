<?php
/*
98. Validate Binary Search Tree - Medium

Given the root of a binary tree, determine if it is a valid binary search tree (BST).

A valid BST is defined as follows:

The left subtree of a node contains only nodes with keys less than the node's key.
The right subtree of a node contains only nodes with keys greater than the node's key.
Both the left and right subtrees must also be binary search trees.
 
Example 1:
Input: root = [2,1,3]
Output: true

Example 2:
Input: root = [5,1,4,null,null,3,6]
Output: false
Explanation: The root node's value is 5 but its right child's value is 4.
 
Constraints:

The number of nodes in the tree is in the range [1, 104].
-231 <= Node.val <= 231 - 1

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
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        return $this->isValidBSTHelper($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBSTHelper($root, $min, $max) {
        if ($root == null) return true;

        return ((($root->val > $min) && ($root->val < $max)) && $this->isValidBSTHelper($root->left, $min, $root->val) && $this->isValidBSTHelper($root->right, $root->val, $max));
    }
}

$root = new TreeNode(2);
$root->left = new TreeNode(1);
$root->right = new TreeNode(3);

$s = new Solution();
var_dump($s->isValidBST($root));
