<?php
/*
189. Rotate Array - Medium
Given an integer array nums, rotate the array to the right by k steps, where k is non-negative.

Example 1:

Input: nums = [1,2,3,4,5,6,7], k = 3
Output: [5,6,7,1,2,3,4]
Explanation:
rotate 1 steps to the right: [7,1,2,3,4,5,6]
rotate 2 steps to the right: [6,7,1,2,3,4,5]
rotate 3 steps to the right: [5,6,7,1,2,3,4]

Example 2:

Input: nums = [-1,-100,3,99], k = 2
Output: [3,99,-1,-100]
Explanation: 
rotate 1 steps to the right: [99,-1,-100,3]
rotate 2 steps to the right: [3,99,-1,-100]

Example 3:

Input: nums = [-1], k = 2
Output: [-1]

Constraints:

1 <= nums.length <= 105
-231 <= nums[i] <= 231 - 1
0 <= k <= 105
 
Follow up:

Try to come up with as many solutions as you can. There are at least three different ways to solve this problem.
Could you do it in-place with O(1) extra space?
*/

/*
Big O Analysis:
Time Complexity - O(n) + O(n) => O(2n) => O(n) constants are ignored in big O
Space Complexity - O(n)

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $n = count($nums);
        $temp = [];
        for ($i=0; $i<$n; $i++) {
            $index = ($i+$k) % $n;
            $temp[$index] = $nums[$i];
        }
        for ($i=0; $i<$n; $i++) {
            $nums[$i] = $temp[$i];
        }
        return;
    }
}

$s = new Solution();
$nums = [1,2,3,4,5,6,7];
$k = 2;
$s->rotate($nums, $k);
print_r($nums);
