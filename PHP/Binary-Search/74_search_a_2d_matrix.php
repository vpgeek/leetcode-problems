<?php
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
Time Complexity - O(log mn)
Space Complexity - O(1)

*/
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $row = count($matrix);
        $col = count($matrix[0]);
        for ($i=0; $i<$row; $i++) {
            if ($target < $matrix[$i][0] || $target > $matrix[$i][$col-1]) {
                continue;
            }
            if ($this->binarySearchHelper($matrix[$i], $target, $col)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Integer[] $array
     * @param Integer $target
     * @param Integer $n
     * @return Boolean
     */
    function binarySearchHelper($array, $target, $n) {
        $l = 0;
        $r = $n-1;
        while ($l <= $r) {
            $mid = floor(($l+$r)/2);
            if ($target == $array[$mid]) {
                return true;
            } elseif ($target < $array[$mid]) {
                $r = $mid-1;
            } else {
                $l = $mid+1;
            }
        }
        return false;
    }
}

$s = new Solution();
var_dump($s->searchMatrix([[1,3,5,7],[10,11,16,20],[23,30,34,60]], 60));
