/*
518. Coin Change II - Medium

You are given an integer array coins representing coins of different denominations and an integer amount representing a total amount of money.

Return the number of combinations that make up that amount. If that amount of money cannot be made up by any combination of the coins, return 0.

You may assume that you have an infinite number of each kind of coin.

The answer is guaranteed to fit into a signed 32-bit integer.

Example 1:

Input: amount = 5, coins = [1,2,5]
Output: 4
Explanation: there are four ways to make up the amount:
5=5
5=2+2+1
5=2+1+1+1
5=1+1+1+1+1

Example 2:

Input: amount = 3, coins = [2]
Output: 0
Explanation: the amount of 3 cannot be made up just with coins of 2.

Example 3:

Input: amount = 10, coins = [10]
Output: 1

Constraints:

1 <= coins.length <= 300
1 <= coins[i] <= 5000
All the values of coins are unique.
0 <= amount <= 5000

*/

/*
 * Big O Analysis:
 * Time Complexity - O(amount * n)
 * Space Complexity - O(amount * n)
 * 
 */

 import java.util.Arrays;

class Solution {
    public static int changeRecursive(int amount, int[] coins) {
        int n = coins.length;
        int[][] dp = new int[n+1][amount+1];
        for (int[] row : dp) {
            Arrays.fill(row, -1);
        }
        return changeMemoizationHelper(amount, coins, n, dp);
    }

    public static int changeRecursiveHelper(int amount, int[] coins, int n) {
        if (n == 0) return 0;
        if (amount == 0) return 1;

        if (coins[n-1] > amount) {
            return changeRecursiveHelper(amount, coins, n-1);
        } else {
            return changeRecursiveHelper(amount, coins, n-1) + changeRecursiveHelper(amount-coins[n-1], coins, n);
        }
    }

    public static int changeMemoizationHelper(int amount, int[] coins, int n, int[][] dp) {
        if (n == 0) return 0;
        if (amount == 0) return 1;

        if (dp[n][amount] != -1) {
            return dp[n][amount];
        }

        if (coins[n-1] > amount) {
            dp[n][amount] = changeMemoizationHelper(amount, coins, n-1, dp);
        } else {
            dp[n][amount] = changeMemoizationHelper(amount, coins, n-1, dp) + changeMemoizationHelper(amount-coins[n-1], coins, n, dp);
        }

        return dp[n][amount];
    }

    public static int changeTabulation1D(int amount, int[] coins) {
        int dp[] = new int[amount+1];
        dp[0] = 1; // for amount 0, you have exactly one way to make it for every coin by not selecting coin
        for (int coin : coins) {
            for (int i=coin; i<=amount; i++) {
                dp[i] += dp[i-coin];
            }
        }
        
        return dp[amount];
    }

    public static int changeTabulation2D(int amount, int[] coins) {
        int n = coins.length;
        int dp[][] = new int[n+1][amount+1];

        for (int i=0; i<=n; i++) {
            dp[i][0] = 1; // for amount 0, you have exactly one way to make it for every coin by not selecting coin
        }

        for (int j=1; j<=amount; j++) {
            dp[0][j] = 0;
        }

        for (int i=1; i<=n; i++) {
            for (int j=1; j<=amount; j++) {
                if (j >= coins[i-1]) {
                    dp[i][j] = dp[i-1][j] + dp[i][j-coins[i-1]]; // exclude & include the current coin
                } else {
                    dp[i][j] = dp[i-1][j]; // exclude the current coin
                }
            }
        }

        return dp[n][amount];
    }

    public static void main(String[] args) {
        System.out.println(changeTabulation2D(5, new int[]{1,2,5}));
        System.out.println(changeTabulation2D(3, new int[]{2}));
        System.out.println(changeTabulation2D(10, new int[]{10}));
        System.out.println(changeTabulation2D(0, new int[]{5}));

        System.out.println(changeRecursive(5, new int[]{1,2,5}));
        System.out.println(changeRecursive(3, new int[]{2}));
        System.out.println(changeRecursive(10, new int[]{10}));
        System.out.println(changeRecursive(0, new int[]{5}));
    }

}
