/*
309. Best Time to Buy and Sell Stock with Cooldown - Medium

You are given an array prices where prices[i] is the price of a given stock on the ith day.

Find the maximum profit you can achieve. You may complete as many transactions as you like (i.e., buy one and sell one share of the stock multiple times) with the following restrictions:

After you sell your stock, you cannot buy stock on the next day (i.e., cooldown one day).
Note: You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).

Example 1:

Input: prices = [1,2,3,0,2]
Output: 3
Explanation: transactions = [buy, sell, cooldown, buy, sell]

Example 2:

Input: prices = [1]
Output: 0
 
Constraints:

1 <= prices.length <= 5000
0 <= prices[i] <= 1000

*/

/*
 * Big O Analysis:
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */

import java.util.HashMap;
import java.util.Map;

class Solution {

    public static int maxProfit(int[] prices) {
        return helper(prices, prices.length, 0, true, new HashMap<>());
    }

    public static int helper(int[] prices, int n, int i, boolean canBuy, Map<String, Integer> dp) {
        if (i >= n) return 0;

        String key = i + "->" + canBuy;
        if (dp.containsKey(key)) {
            return dp.get(key);
        }

        // buy/hold or sell/hold on a day
        if (canBuy) {
            int buy = helper(prices, n, i+1, ! canBuy, dp) - prices[i];
            int hold = helper(prices, n, i+1, canBuy, dp);
            dp.put(key, Math.max(buy, hold));
        } else {
            int sell = helper(prices, n, i+2, ! canBuy, dp) + prices[i];
            int hold = helper(prices, n, i+1, canBuy, dp);
            dp.put(key, Math.max(sell, hold));
        }

        return dp.get(key);
    }

    public static void main(String[] args) {
        System.out.println(maxProfit(new int[]{1,2,3,0,2}));
        System.out.println(maxProfit(new int[]{1}));
    }

}
