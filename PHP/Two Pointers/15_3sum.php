<?php
/*
15. 3Sum - Medium

Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j != k, and nums[i] + nums[j] + nums[k] == 0.

Notice that the solution set must not contain duplicate triplets.

Example 1:

Input: nums = [-1,0,1,2,-1,-4]
Output: [[-1,-1,2],[-1,0,1]]
Explanation: 
nums[0] + nums[1] + nums[2] = (-1) + 0 + 1 = 0.
nums[1] + nums[2] + nums[4] = 0 + 1 + (-1) = 0.
nums[0] + nums[3] + nums[4] = (-1) + 2 + (-1) = 0.
The distinct triplets are [-1,0,1] and [-1,-1,2].
Notice that the order of the output and the order of the triplets does not matter.
Example 2:

Input: nums = [0,1,1]
Output: []
Explanation: The only possible triplet does not sum up to 0.
Example 3:

Input: nums = [0,0,0]
Output: [[0,0,0]]
Explanation: The only possible triplet sums up to 0.

*/

class Solution {

    /**
     * Time Complexity - O(n^2) - for sort it is O(nlogn) & for two loops, it is O(n^2), so overall n^2
     * Space Complexity - O(n) - the result array size will be proportional to the input size
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        sort($nums);
        $result = [];
        for ($i=0; $i<count($nums)-1; $i++) {
            if (($i > 0) && ($nums[$i] == $nums[$i-1])) {
                continue;
            }
            $l = $i+1;
            $r = count($nums)-1;
            while ($l < $r) {
                $sum = ($nums[$i] + $nums[$l] + $nums[$r]);
                if ($sum == 0) {
                    $result[] = [$nums[$i], $nums[$l], $nums[$r]];
                    $l++;
                    $r--;
                    while (($l < $r) && ($nums[$l] == $nums[$l-1])) {
                        $l++;
                    }
                    while (($l < $r) && ($nums[$r] == $nums[$r+1])) {
                        $r--;
                    }
                } elseif ($sum < 0) {
                    $l++;
                } else {
                    $r--;
                }
            }
        }
        return $result;
    }
}

$sol = new Solution();
print_r($sol->threeSum([-1,0,1,2,-1,-4]));
