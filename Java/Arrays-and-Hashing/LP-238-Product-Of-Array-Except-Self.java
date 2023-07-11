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

/**
 * Big O Analysis:
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */

import java.util.Arrays;

class Solution {

    public int[] productExceptSelf(int[] nums) {
        int n = nums.length;
        int[] result = new int[n];
        int lprod = 1;
        int rprod = 1;

        for (int i=0; i<n; i++) {
            result[i] = lprod;
            lprod *= nums[i];
        }

        for (int i=n-1; i>=0; i--) {
            result[i] *= rprod;
            rprod *= nums[i];
        }

        return result;
    }

    public static void main(String[] args) {
        Solution s = new Solution();
        System.out.println(Arrays.toString(s.productExceptSelf(new int[]{1,2,3,4})));
    }

}
