/*
628. Maximum Product of Three Numbers - Easy

Given an integer array nums, find three numbers whose product is maximum and return the maximum product.

Example 1:

Input: nums = [1,2,3]
Output: 6

Example 2:

Input: nums = [1,2,3,4]
Output: 24

Example 3:

Input: nums = [-1,-2,-3]
Output: -6

Constraints:

3 <= nums.length <= 104
-1000 <= nums[i] <= 1000

*/

/*
Big O Analysis:
Time Complexity - O(n)
Space Complexity - O(1)

*/

import java.util.Arrays;

class Solution {
    public static int maximumProductSort(int[] nums) {
        Arrays.sort(nums);
        int n = nums.length;
        return Math.max(nums[n-1] * nums[n-2] * nums[n-3], nums[0] * nums[1] * nums[n-1]);
    }

    public static int maximumProduct(int[] nums) {
        int firstMax = Integer.MIN_VALUE;
        int secondMax = Integer.MIN_VALUE;
        int thirdMax = Integer.MIN_VALUE;
        int firstMin = Integer.MAX_VALUE;
        int secondMin = Integer.MAX_VALUE;
        for (int i=0; i<nums.length; i++) {
            // find max
            if (firstMax < nums[i]) {
                thirdMax = secondMax;
                secondMax = firstMax;
                firstMax = nums[i];
            } else if (secondMax < nums[i]) {
                thirdMax = secondMax;
                secondMax = nums[i];
            } else if (thirdMax < nums[i]) {
                thirdMax = nums[i];
            }

            // find min
            if (firstMin > nums[i]) {
                secondMin = firstMin;
                firstMin = nums[i];
            } else if (secondMin > nums[i]) {
                secondMin = nums[i];
            }
        }

        return Math.max(firstMax * secondMax * thirdMax, firstMin * secondMin * firstMax);
    }

    public static void main(String[] args) {
        System.out.println(maximumProduct(new int[]{1,2,3}));
        System.out.println(maximumProduct(new int[]{1,2,3,4}));
        System.out.println(maximumProduct(new int[]{-1,-2,-3}));
        System.out.println(maximumProduct(new int[]{100, 90, 80, -50,-20,-30}));
    }

}
