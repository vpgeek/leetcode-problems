<?php
/*
226. Invert Binary Tree - Easy
Given the root of a binary tree, invert the tree, and return its root.

Example 1:
Input: root = [4,2,7,1,3,6,9]
Output: [4,7,2,9,6,3,1]

Example 2:
Input: root = [2,1,3]
Output: [2,3,1]

Example 3:
Input: root = []
Output: []

Constraints:

The number of nodes in the tree is in the range [0, 100].
-100 <= Node.val <= 100
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
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if ($root == null) return;

        // swap left and right nodes of root
        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;

        $this->invertTree($root->left);
        $this->invertTree($root->right);

        return $root;
    }

    function printTree($root) {
        if ($root == null) return;
        echo $root->val . '<br/>';
        $this->printTree($root->left);
        $this->printTree($root->right);
    }
}

$root = new TreeNode(2);
$root->left = new TreeNode(1);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(1);
$root->left->right = new TreeNode(3);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(9);

$s = new Solution();
echo 'Tree before inverting<br/>';
$s->printTree($root);
$s->invertTree($root);
echo 'Tree after inverting<br/>';
$s->printTree($root);
