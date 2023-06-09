<?php
/*
33. Search in Rotated Sorted Array - Medium

There is an integer array nums sorted in ascending order (with distinct values).

Prior to being passed to your function, nums is possibly rotated at an unknown pivot index k (1 <= k < nums.length) such that the resulting array is [nums[k], nums[k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]] (0-indexed). For example, [0,1,2,4,5,6,7] might be rotated at pivot index 3 and become [4,5,6,7,0,1,2].

Given the array nums after the possible rotation and an integer target, return the index of target if it is in nums, or -1 if it is not in nums.

You must write an algorithm with O(log n) runtime complexity.

Example 1:
Input: nums = [4,5,6,7,0,1,2], target = 0
Output: 4

Example 2:
Input: nums = [4,5,6,7,0,1,2], target = 3
Output: -1

Example 3:
Input: nums = [1], target = 0
Output: -1
 
Constraints:

1 <= nums.length <= 5000
-104 <= nums[i] <= 104
All values of nums are unique.
nums is an ascending array that is possibly rotated.
-104 <= target <= 104
*/

/*
Big O Analysis:
Time Complexity - O(log n)
Space Complexity - O(1)

*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $l = 0;
        $r = count($nums) - 1;
        while ($l <= $r) {
            $mid = floor(($l+$r) / 2);
            if ($target == $nums[$mid]) {
                return $mid;
            }
            if ($nums[$l] <= $nums[$mid]) {
                // left side is sorted
                if ($nums[$l] <= $target && $target < $nums[$mid]) {
                    $r = $mid - 1;
                } else {
                    $l = $mid + 1;
                }
            } else {
                // right side is sorted
                if ($nums[$mid] < $target && $target <= $nums[$r]) {
                    $l = $mid + 1;
                } else {
                    $r = $mid - 1;
                }
            }
        }
        return -1;
    }
}

$s = new Solution();
echo $s->search([5,1,3], 5);
