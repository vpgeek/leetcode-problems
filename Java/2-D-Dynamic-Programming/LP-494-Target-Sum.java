/*
494. Target Sum - Medium

You are given an integer array nums and an integer target.

You want to build an expression out of nums by adding one of the symbols '+' and '-' before each integer in nums and then concatenate all the integers.

For example, if nums = [2, 1], you can add a '+' before 2 and a '-' before 1 and concatenate them to build the expression "+2-1".
Return the number of different expressions that you can build, which evaluates to target.

Example 1:

Input: nums = [1,1,1,1,1], target = 3
Output: 5
Explanation: There are 5 ways to assign symbols to make the sum of nums be target 3.
-1 + 1 + 1 + 1 + 1 = 3
+1 - 1 + 1 + 1 + 1 = 3
+1 + 1 - 1 + 1 + 1 = 3
+1 + 1 + 1 - 1 + 1 = 3
+1 + 1 + 1 + 1 - 1 = 3

Example 2:

Input: nums = [1], target = 1
Output: 1

Constraints:

1 <= nums.length <= 20
0 <= nums[i] <= 1000
0 <= sum(nums[i]) <= 1000
-1000 <= target <= 1000

*/

/*
 * Big O Analysis:
 * Time Complexity - O(n * total), total = total sum of array
 * Space Complexity - O(n * total)
 * 
 */

import java.util.HashMap;
import java.util.Map;

class Solution {
    public static int findTargetSumWays(int[] nums, int target) {
        return helper(nums, target, 0, 0, new HashMap<>());
    }

    public static int helper(int[] nums, int target, int index, int total, Map<String, Integer> dp) {
        if (index == nums.length) {
            if (total == target)
                return 1;
            else
                return 0;
        }

        String key = index + "->" + total;
        if (dp.containsKey(key)) {
            return dp.get(key);
        }

        int val = helper(nums, target, index+1, total+nums[index], dp) + helper(nums, target, index+1, total-nums[index], dp);
        dp.put(key, val);

        return dp.get(key);
    }

    public static void main(String[] args) {
        System.out.println(findTargetSumWays(new int[]{1,1,1,1,1}, 3));
        System.out.println(findTargetSumWays(new int[]{1}, 1));
    }

}
