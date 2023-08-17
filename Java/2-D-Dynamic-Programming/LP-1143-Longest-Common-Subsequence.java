/*
1143. Longest Common Subsequence - Medium

Given two strings text1 and text2, return the length of their longest common subsequence. If there is no common subsequence, return 0.

A subsequence of a string is a new string generated from the original string with some characters (can be none) deleted without changing the relative order of the remaining characters.

For example, "ace" is a subsequence of "abcde".
A common subsequence of two strings is a subsequence that is common to both strings.

Example 1:

Input: text1 = "abcde", text2 = "ace" 
Output: 3  
Explanation: The longest common subsequence is "ace" and its length is 3.

Example 2:

Input: text1 = "abc", text2 = "abc"
Output: 3
Explanation: The longest common subsequence is "abc" and its length is 3.

Example 3:

Input: text1 = "abc", text2 = "def"
Output: 0
Explanation: There is no such common subsequence, so the result is 0.
 
Constraints:

1 <= text1.length, text2.length <= 1000
text1 and text2 consist of only lowercase English characters.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m*n)
 * Space Complexity - O(m*n)
 */

import java.util.Arrays;

class Solution {
    public static int longestCommonSubsequence(String text1, String text2) {
        int m = text1.length();
        int n = text2.length();
        int[][] dp = new int[m+1][n+1];
        for (int i=0; i<=m; i++) {
            for (int j=0; j<=n; j++) {
                if (i == 0 || j == 0) {
                    dp[i][j] = 0;
                } else if (text1.charAt(i-1) == text2.charAt(j-1)) {
                    dp[i][j] = dp[i-1][j-1] + 1;
                } else {
                    dp[i][j] = Math.max(dp[i-1][j], dp[i][j-1]);
                }
            }
        }

        return dp[m][n];
    }

    public static int longestCommonSubsequenceRecursive(String text1, String text2) {
        int m = text1.length();
        int n = text2.length();
        int[][] dp = new int[m+1][n+1];
        for (int[] row : dp) {
            Arrays.fill(row, -1);
        }
        return longestCommonSubsequenceHelper(text1, text2, m, n, dp);
    }

    public static int longestCommonSubsequenceHelper(String text1, String text2, int m, int n, int[][] dp) {
        if (m ==0 || n == 0) {
            return 0;
        }

        if (dp[m][n] != -1) {
            return dp[m][n];
        }

        if (text1.charAt(m-1) == text2.charAt(n-1)) {
            dp[m][n] = longestCommonSubsequenceHelper(text1, text2, m-1, n-1, dp) + 1;
        } else {
            dp[m][n] = Math.max(longestCommonSubsequenceHelper(text1, text2, m, n-1, dp), longestCommonSubsequenceHelper(text1, text2, m-1, n, dp));
        }
        return dp[m][n];
    }

    public static void main(String[] args) {
        // tabulation
        System.out.println(longestCommonSubsequence("", ""));
        System.out.println(longestCommonSubsequence("abcde", "ace"));
        System.out.println(longestCommonSubsequence("abc", "abc"));
        System.out.println(longestCommonSubsequence("abc", "def"));

        // memoization
        System.out.println(longestCommonSubsequenceRecursive("", ""));
        System.out.println(longestCommonSubsequenceRecursive("abcde", "ace"));
        System.out.println(longestCommonSubsequenceRecursive("abc", "abc"));
        System.out.println(longestCommonSubsequenceRecursive("abc", "def"));
    }

}
