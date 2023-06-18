<?php
/*
199. Binary Tree Right Side View - Medium

Given the root of a binary tree, imagine yourself standing on the right side of it, return the values of the nodes you can see ordered from top to bottom.

Example 1:

Input: root = [1,2,3,null,5,null,4]
Output: [1,3,4]

Example 2:

Input: root = [1,null,3]
Output: [1,3]

Example 3:

Input: root = []
Output: []

Constraints:

The number of nodes in the tree is in the range [0, 100].
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

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root) {
        if ($root == null) return [];

        $queue = new SplQueue();
        $queue->enqueue($root);
        while (! $queue->isEmpty()) {
            $size = $queue->count();
            for ($i=0; $i<$size; $i++) {
                $current = $queue->dequeue();
                if ($i+1 == $size) {
                    $result[] = $current->val;
                }
                if ($current->left != null) {
                    $queue->enqueue($current->left);
                }
                if ($current->right != null) {
                    $queue->enqueue($current->right);
                }
            }
        }

        return $result;
    }
}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->right = new TreeNode(5);
$root->right->right = new TreeNode(4);

$s = new Solution();
$result = $s->rightSideView($root);
print_r($result);
