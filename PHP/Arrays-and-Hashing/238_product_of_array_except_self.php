<?php
/*
238. Product of Array Except Self - Medium

Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].

The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.

You must write an algorithm that runs in O(n) time and without using the division operation.

Example 1:

Input: nums = [1,2,3,4]
Output: [24,12,8,6]
Example 2:

Input: nums = [-1,1,0,-3,3]
Output: [0,0,9,0,0]

*/

class Solution {

    /**
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     * 
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $n = count($nums);
        $lprod = $rprod = 1;

        for ($i=0; $i<$n; $i++) {
            $res[$i] = $lprod;
            $lprod *= $nums[$i];
        }

        for ($i=$n-1; $i>=0; $i--) {
            $res[$i] *= $rprod;
            $rprod *= $nums[$i];
        }

        return $res;
    }
}


$s = new Solution();
print_r($s->productExceptSelf([1,2,3,4]));
