/*
74. Search a 2D Matrix - Medium

You are given an m x n integer matrix matrix with the following two properties:

Each row is sorted in non-decreasing order.
The first integer of each row is greater than the last integer of the previous row.
Given an integer target, return true if target is in matrix or false otherwise.

You must write a solution in O(log(m * n)) time complexity.

Example 1:
Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
Output: true

Example 2:
Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
Output: false
 
Example 3:
Input: matrix = [[1]], target = 1
Output: true

Constraints:

m == matrix.length
n == matrix[i].length
1 <= m, n <= 100
-104 <= matrix[i][j], target <= 104
*/

/*
Big O Analysis:
Time Complexity - O(log(m*n))
Space Complexity - O(1)

*/

class Solution {

    public static void main(String[] args) {
        int matrix[][] = { {1,3,5,7},{10,11,16,20},{23,30,34,60} };
        int target = 3;
        Solution s = new Solution();
        System.out.println(s.searchMatrix(matrix, target));
    }

    public boolean searchMatrix(int[][] matrix, int target) {
        int rows = matrix.length;
        int cols = matrix[0].length;
        int l = 0;
        int r = (rows * cols) - 1;
        while (l <= r) {
            int mid = (l + r) / 2;
            if (target == matrix[mid / cols][mid % cols]) {
                return true;
            } else if (target > matrix[mid / cols][mid % cols]) {
                l = mid + 1;
            } else {
                r = mid-1;
            }
        }
        return false;
    }
}

