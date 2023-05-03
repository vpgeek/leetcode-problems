<?php
/*
704. Binary Search - Easy

Approach II - Recursive

Given an array of integers nums which is sorted in ascending order, and an integer target, write a function to search target in nums. If target exists, then return its index. Otherwise, return -1.

You must write an algorithm with O(log n) runtime complexity.

Example 1:

Input: nums = [-1,0,3,5,9,12], target = 9
Output: 4
Explanation: 9 exists in nums and its index is 4
Example 2:

Input: nums = [-1,0,3,5,9,12], target = 2
Output: -1
Explanation: 2 does not exist in nums so return -1
 
Constraints:

1 <= nums.length <= 104
-104 < nums[i], target < 104
All the integers in nums are unique.
nums is sorted in ascending order.
*/

class Solution {

    /**
     * Time - O(logn)
     * Space - O(logn)
     * 
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        return $this->binarySearchHelper($nums, $target, 0, count($nums)-1);
    }    

    function binarySearchHelper($nums, $target, $left, $right) {
        if ($left > $right) {
            return -1;
        }
        $mid = floor(($left+$right)/2);
        if ($nums[$mid] == $target) {
            return $mid;
        } elseif ($nums[$mid] < $target) {
            return $this->binarySearchHelper($nums, $target, $mid+1, $right);
        } else {
            return $this->binarySearchHelper($nums, $target, $left, $mid-1);
        }
    }
}

$s = new Solution();
echo $s->search([-1,0,3,5,9,12], 9);
