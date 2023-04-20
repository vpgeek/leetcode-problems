<?php
/*
36. Valid Sudoku - Medium

Determine if a 9 x 9 Sudoku board is valid. Only the filled cells need to be validated according to the following rules:

Each row must contain the digits 1-9 without repetition.
Each column must contain the digits 1-9 without repetition.
Each of the nine 3 x 3 sub-boxes of the grid must contain the digits 1-9 without repetition.
Note:

A Sudoku board (partially filled) could be valid but is not necessarily solvable.
Only the filled cells need to be validated according to the mentioned rules.

Example 1:
Input: board = 
[["5","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]]
Output: true

Example 2:
Input: board = 
[["8","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]]
Output: false

*/

class Solution {

    /**
     * Time Complexity: O(n^2) or O(n*n)
     * Space Complexity: O(n^2) or O(n*n)
     * 
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $rows = [];
        $cols = [];
        $grids = [];
        for ($i=0; $i<9; $i++) {
            for ($j=0; $j<9; $j++) {
                $num = $board[$i][$j];
                if ($num != '.') {
                    $k = floor($i/3)*3+floor($j/3);
                    if (isset($rows[$i][$num]) || 
                        isset($cols[$j][$num]) || 
                        isset($grids[$k][$num])) {
                        return false;
                    }
                    $rows[$i][$num] = $cols[$j][$num] = $grids[$k][$num] = 1;
                }
            }
        }
        return true;
    }
}

$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];

$sol = new Solution();
var_dump($sol->isValidSudoku($board));
