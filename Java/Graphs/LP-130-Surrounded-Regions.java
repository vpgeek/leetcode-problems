/*
130. Surrounded Regions - Medium

Given an m x n matrix board containing 'X' and 'O', capture all regions that are 4-directionally surrounded by 'X'.

A region is captured by flipping all 'O's into 'X's in that surrounded region.

Example 1:

Input: board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]]
Output: [["X","X","X","X"],["X","X","X","X"],["X","X","X","X"],["X","O","X","X"]]
Explanation: Notice that an 'O' should not be flipped if:
- It is on the border, or
- It is adjacent to an 'O' that should not be flipped.
The bottom 'O' is on the border, so it is not flipped.
The other three 'O' form a surrounded region, so they are flipped.

Example 2:

Input: board = [["X"]]
Output: [["X"]]

Constraints:

m == board.length
n == board[i].length
1 <= m, n <= 200
board[i][j] is 'X' or 'O'.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m.n)
 * Space Complexity - O(m.n), recurrsive call stack
 */

class Solution {
    public static void solve(char[][] board) {
        int m = board.length;
        int n = board[0].length;

        // first convert all the boundary 'O's and it's connected 'O's to '#'
        for (int i=0; i<m; i++) {
            if (board[i][0] == 'O') {
                dfs(board, i, 0, m, n);
            }
            if (board[i][n-1] == 'O') {
                dfs(board, i, n-1, m, n);
            }
        }

        for (int j=0; j<n; j++) {
            if (board[0][j] == 'O') {
                dfs(board, 0, j, m, n);
            }
            if (board[m-1][j] == 'O') {
                dfs(board, m-1, j, m, n);
            }
        }

        // next convert all 'O's to 'X' and '#'s to 'O'
        for (int i=0; i<m; i++) {
            for (int j=0; j<n; j++) {
                if (board[i][j] == 'O') {
                    board[i][j] = 'X';
                }
                if (board[i][j] == '#') {
                    board[i][j] = 'O';
                }
            }
        }

        return;
    }

    public static void dfs(char[][] board, int i, int j, int m, int n) {
        if (i < 0 || j < 0 || i >= m || j >= n || board[i][j] != 'O') return;
        board[i][j] = '#';
        dfs(board, i-1, j, m, n);
        dfs(board, i, j-1, m, n);
        dfs(board, i+1, j, m, n);
        dfs(board, i, j+1, m, n);
    }

    public static void printBoard(char[][] board) {
        for (int i=0; i<board.length; i++) {
            for (int j=0; j<board[0].length; j++) {
                System.out.print(board[i][j] + " ");
            }
            System.out.println();
        }
    }

    public static void main(String[] args) {
        char[][] board = new char[][]{{'X','X','X','X'},{'X','O','O','X'},{'X','X','O','X'},{'X','O','X','X'}};
        printBoard(board);        
        solve(board);
        System.out.println();
        printBoard(board);
    }

}
