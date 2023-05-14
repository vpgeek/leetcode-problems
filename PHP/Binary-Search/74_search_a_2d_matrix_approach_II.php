<?php
/*
74. Search a 2D Matrix - Medium

Approach II - flatten 2d matrix to one-dimensional array and do binary search

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

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $rows = count($matrix);
        $cols = count($matrix[0]);
        $l = 0;
        $r = ($rows * $cols) - 1;
        while ($l <= $r) {
            $mid = floor(($l + $r) / 2);
            if ($target == $matrix[floor($mid / $cols)][$mid % $cols]) {
                return true;
            } elseif ($target > $matrix[floor($mid / $cols)][$mid % $cols]) {
                $l = $mid + 1;
            } else {
                $r = $mid - 1;
            }
        }
        return false;
    }
}

$s = new Solution();
var_dump($s->searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 7));
