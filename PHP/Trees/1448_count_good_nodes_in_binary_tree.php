<?php
/*
1448. Count Good Nodes in Binary Tree - Medium

Given a binary tree root, a node X in the tree is named good if in the path from root to X there are no nodes with a value greater than X.

Return the number of good nodes in the binary tree.

Example 1:

Input: root = [3,1,4,3,null,1,5]
Output: 4
Explanation: Nodes in blue are good.
Root Node (3) is always a good node.
Node 4 -> (3,4) is the maximum value in the path starting from the root.
Node 5 -> (3,4,5) is the maximum value in the path
Node 3 -> (3,1,3) is the maximum value in the path.

Example 2:

Input: root = [3,3,null,4,2]
Output: 3
Explanation: Node 2 -> (3, 3, 2) is not good, because "3" is higher than it.

Example 3:

Input: root = [1]
Output: 1
Explanation: Root is considered as good.
 
Constraints:

The number of nodes in the binary tree is in the range [1, 10^5].
Each node's value is between [-10^4, 10^4].

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
     * @return Integer
     */
    function goodNodes($root) {
        $count = 0;
        $this->goodNodesHelper($root, PHP_INT_MIN, $count);
        return $count;
    }

    /**
     * @param TreeNode $root
     * @param Integer $max
     * @return null
     */
    function goodNodesHelper($root, $max, &$count) {
        if ($root == null) return;

        if ($root->val >= $max) {
            $count++;
        }
        $max = max($max, $root->val);
        $this->goodNodesHelper($root->left, $max, $count);
        $this->goodNodesHelper($root->right, $max, $count);
    }
}

$root = new TreeNode(3);
$root->left = new TreeNode(1);
$root->right = new TreeNode(4);
$root->left->left = new TreeNode(3);
$root->right->left = new TreeNode(1);
$root->right->right = new TreeNode(5);

$s = new Solution();
print_r($s->goodNodes($root));
