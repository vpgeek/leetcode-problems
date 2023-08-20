/*
322. Coin Change - Medium

You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.

Return the fewest number of coins that you need to make up that amount. If that amount of money cannot be made up by any combination of the coins, return -1.

You may assume that you have an infinite number of each kind of coin.

Example 1:

Input: coins = [1,2,5], amount = 11
Output: 3
Explanation: 11 = 5 + 5 + 1

Example 2:

Input: coins = [2], amount = 3
Output: -1

Example 3:

Input: coins = [1], amount = 0
Output: 0

Constraints:

1 <= coins.length <= 12
1 <= coins[i] <= 231 - 1
0 <= amount <= 104

*/

/**
 * Big O Analysis:
 * Time Complexity - O(amount * n)
 * Space Complexity - O(amount)
 * 
 */

import java.util.Arrays;

class Solution {
    public static int coinChange(int[] coins, int amount) {
        int[] dp = new int[amount+1];
        Arrays.fill(dp, Integer.MAX_VALUE);
        dp[0] = 0;
        for (int coin : coins) {
            for (int i=coin; i<=amount; i++) {
                if (dp[i-coin] != Integer.MAX_VALUE) {
                    dp[i] = Math.min(dp[i], dp[i-coin]+1);
                }
            }
        }

        return (dp[amount] == Integer.MAX_VALUE) ? -1 : dp[amount];
    }

    public static int coinChangeOld(int[] coins, int amount) {
        int[] dp = new int[amount+1];
        Arrays.fill(dp, amount+1);
        dp[0] = 0;
        for (int i=1; i<=amount; i++) {
            for (int c : coins) {
                if (i-c >= 0) {
                    dp[i] = Math.min(dp[i], dp[i-c]+1);
                }
            }
        }

        return (dp[amount] > amount) ? -1 : dp[amount];
    }

    public static void main(String[] args) {
        System.out.println(coinChange(new int[]{1,2,5}, 11));
        System.out.println(coinChange(new int[]{2}, 3));
        System.out.println(coinChange(new int[]{1}, 0));
    }

}

/*
 
Input: coins = [1,2,5], amount = 11


0      1      2       3       4       5       6       7       8       9       10     11
[]    [1]    [2]    [1,2]    [2,2]   [5]    [1,5]   [2,5]
            [1,1]   [2,1]                  


0       1       2       3
[]              1


*/