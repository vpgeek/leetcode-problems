/*
53. Maximum Subarray - Medium

Given an integer array nums, find the subarray with the largest sum, and return its sum.

Example 1:
Input: nums = [-2,1,-3,4,-1,2,1,-5,4]
Output: 6
Explanation: The subarray [4,-1,2,1] has the largest sum 6.

Example 2:
Input: nums = [1]
Output: 1
Explanation: The subarray [1] has the largest sum 1.

Example 3:
Input: nums = [5,4,-1,7,8]
Output: 23
Explanation: The subarray [5,4,-1,7,8] has the largest sum 23.
 
Constraints:

1 <= nums.length <= 105
-104 <= nums[i] <= 104
 
Follow up: If you have figured out the O(n) solution, try coding another solution using the divide and conquer approach, which is more subtle.
*/

/**
 * Big O Analysis:
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */

class Solution {
    public int maxSubArray(int[] nums) {
        int max = Integer.MIN_VALUE;
        int currentMax = 0;
        for (int i=0; i<nums.length; i++) {
            currentMax += nums[i];
            max = Math.max(max, currentMax);
            if (currentMax < 0) {
                currentMax = 0;
            }
        }

        return max;
    }

    public static void main(String[] args) {
        Solution s = new Solution();
        System.out.println(s.maxSubArray(new int[]{-2,1,-3,4,-1,2,1,-5,4}));
    }

}