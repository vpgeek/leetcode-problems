/*
Best Time to Buy and Sell Stock - Easy

You are given an array prices where prices[i] is the price of a given stock on the ith day.

You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.

Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.

Input: prices = [7,1,5,3,6,4]
Output: 5

Input: prices = [7,6,4,3,1]
Output: 0

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */

class Solution {

    public static int maxProfit(int[] prices) {
        int maxProfit = 0;
        int minBuy = prices[0];
        for (int i=1; i<prices.length; i++) {
            if (minBuy < prices[i]) {
                maxProfit = Math.max(maxProfit, prices[i] - minBuy);
            } else {
                minBuy = prices[i];
            }
        }
        return maxProfit;
    }

    public static void main(String[] args) {
        System.out.println(maxProfit(new int[]{7,1,5,3,6,4}));
        System.out.println(maxProfit(new int[]{7,6,4,3,1}));
    }

}
