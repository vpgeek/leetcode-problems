/*
62. Unique Paths - Medium

There is a robot on an m x n grid. The robot is initially located at the top-left corner (i.e., grid[0][0]). The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). The robot can only move either down or right at any point in time.

Given the two integers m and n, return the number of possible unique paths that the robot can take to reach the bottom-right corner.

The test cases are generated so that the answer will be less than or equal to 2 * 109.

Example 1:

Input: m = 3, n = 7
Output: 28

Example 2:

Input: m = 3, n = 2
Output: 3
Explanation: From the top-left corner, there are a total of 3 ways to reach the bottom-right corner:
1. Right -> Down -> Down
2. Down -> Down -> Right
3. Down -> Right -> Down

Constraints:

1 <= m, n <= 100

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m*n)
 * Space Complexity - O(m*n)
 */

class Solution {
    public static int uniquePaths(int m, int n) {
        int[][] dp = new int[m+1][n+1];

        for (int i=0; i<=m; i++) {
            for (int j=0; j<=n; j++) {
                // if there are 0 rows or 0 cols, the no of ways is 0
                // if there are 1 rows or 1 cols, the no of ways is 1
                if (i == 0 || j == 0) {
                    dp[i][j] = 0;
                } else if (i == 1 || j == 1) {
                    dp[i][j] = 1;
                } else {
                    dp[i][j] = dp[i-1][j] + dp[i][j-1];
                }
            }
        }
        
        return dp[m][n];
    }

    public static void main(String[] args) {
        System.out.println(uniquePaths(3,7));
        System.out.println(uniquePaths(3,2));
        System.out.println(uniquePaths(1,1));
    }
}
