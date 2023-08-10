/*
198. House Robber - Medium

You are a professional robber planning to rob houses along a street. Each house has a certain amount of money stashed, the only constraint stopping you from robbing each of them is that adjacent houses have security systems connected and it will automatically contact the police if two adjacent houses were broken into on the same night.

Given an integer array nums representing the amount of money of each house, return the maximum amount of money you can rob tonight without alerting the police.

Example 1:

Input: nums = [1,2,3,1]
Output: 4
Explanation: Rob house 1 (money = 1) and then rob house 3 (money = 3).
Total amount you can rob = 1 + 3 = 4.

Example 2:

Input: nums = [2,7,9,3,1]
Output: 12
Explanation: Rob house 1 (money = 2), rob house 3 (money = 9) and rob house 5 (money = 1).
Total amount you can rob = 2 + 9 + 1 = 12.
 
Constraints:

1 <= nums.length <= 100
0 <= nums[i] <= 400

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */

class Solution {

    public static int rob(int[] nums) {
        int n = nums.length;
        int prev2, prev, curr;
        prev2 = prev = curr = 0;
        for (int i=0; i<n; i++) {
            curr = Math.max(prev2 + nums[i], prev);
            prev2 = prev;
            prev = curr;
        }

        return curr;
    }

    public static int robDp(int[] nums) {
        int n = nums.length;
        if (n == 0) return 0;
        int[] dp = new int[n+1];
        dp[0] = 0;
        dp[1] = nums[0];
        for (int i=2; i<=n; i++) {
            dp[i] = Math.max(dp[i-2] + nums[i-1], dp[i-1]);
        }
        return dp[n];
    }

    public static void main(String[] args) {
        System.out.println(rob(new int[]{1,2,3,1}));
        System.out.println(rob(new int[]{2,7,9,3,1}));
        System.out.println(rob(new int[]{2,1,1,2}));
        System.out.println(rob(new int[]{}));
        System.out.println(rob(new int[]{1}));
        System.out.println(rob(new int[]{1,2}));
    }

}
