<?php
/*
572. Subtree of Another Tree - Easy

Given the roots of two binary trees root and subRoot, return true if there is a subtree of root with the same structure and node values of subRoot and false otherwise.

A subtree of a binary tree tree is a tree that consists of a node in tree and all of this node's descendants. The tree tree could also be considered as a subtree of itself.

Example 1:

Input: root = [3,4,5,1,2], subRoot = [4,1,2]
Output: true

Example 2:

Input: root = [3,4,5,1,2,null,null,null,null,0], subRoot = [4,1,2]
Output: false

Constraints:

The number of nodes in the root tree is in the range [1, 2000].
The number of nodes in the subRoot tree is in the range [1, 1000].
-104 <= root.val <= 104
-104 <= subRoot.val <= 104

*/

/**
 *Big O Analysis
 * 
 * Time Complexity - O(m n), m => no of nodes in root tree, n => no of nodes in subRoot tree
 * Space Complexity - O(m + n) 
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
     * @param TreeNode $subRoot
     * @return Boolean
     */
    function isSubtree($root, $subRoot) {
        if ($root == null && $subRoot == null) return true;
        if ($root == null || $subRoot == null) return false;
        return $this->isSameTree($root, $subRoot) || $this->isSubtree($root->left, $subRoot) || $this->isSubtree($root->right, $subRoot);
    }

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

$root = new TreeNode(3);
$root->left = new TreeNode(4);
$root->right = new TreeNode(5);
$root->left->left = new TreeNode(1);
$root->left->right = new TreeNode(2);

$subRoot = new TreeNode(4);
$subRoot->left = new TreeNode(1);
$subRoot->right = new TreeNode(2);

$s = new Solution();
var_dump($s->isSubtree($root, $subRoot));
