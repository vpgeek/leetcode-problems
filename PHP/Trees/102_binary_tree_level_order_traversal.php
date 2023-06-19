<?php
/*
102. Binary Tree Level Order Traversal - Medium

Given the root of a binary tree, return the level order traversal of its nodes' values. (i.e., from left to right, level by level).

Example 1:

Input: root = [3,9,20,null,null,15,7]
Output: [[3],[9,20],[15,7]]

Example 2:

Input: root = [1]
Output: [[1]]

Example 3:

Input: root = []
Output: []

Constraints:

The number of nodes in the tree is in the range [0, 2000].
-1000 <= Node.val <= 1000

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
     * @return Integer[][]
     */
    function levelOrder($root) {
        if ($root == null) return [];

        $result = [];
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (! $queue->isEmpty()) {
            $size = $queue->count();
            $arr = [];
            for ($i=0; $i<$size; $i++) {
                $current = $queue->dequeue();
                $arr[] = $current->val;
                if ($current->left) {
                    $queue->enqueue($current->left);
                }
                if ($current->right) {
                    $queue->enqueue($current->right);
                }
            }
            $result[] = $arr;
        }

        return $result;
    }
}

$root = new TreeNode(3);
$root->left = new TreeNode(9);
$root->right = new TreeNode(20);
$root->right->left = new TreeNode(15);
$root->right->right = new TreeNode(7);

$s = new Solution();
$result = $s->levelOrder($root);
print_r($result);
