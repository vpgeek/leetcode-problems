<?php
/*
128. Longest Consecutive Sequence - Medium

Given an unsorted array of integers nums, return the length of the longest consecutive elements sequence.

You must write an algorithm that runs in O(n) time.

Example 1:

Input: nums = [100,4,200,1,3,2]

Output: 4
Explanation: The longest consecutive elements sequence is [1, 2, 3, 4]. Therefore its length is 4.
Example 2:

Input: nums = [0,3,7,2,5,8,4,6,0,1]
Output: 9

*/

class Solution {

    /**
     * Time Complexity: O(n)
     * Space Complxity: O(n)
     * 
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        $longest = $longer = 0;

        foreach ($nums as $n) {
            $hash[$n] = isset($hash[$n]) ? $hash[$n]+1 : 1; 
        }

        foreach ($nums as $n) {
            if (isset($hash[$n-1])) continue;
            $longer = 1;
            while (isset($hash[++$n])) {
                $longer++;
            }
            $longest = max($longest, $longer);
        }
        return $longest;
    }
}

$s = new Solution();
echo ($s->longestConsecutive([100,4,200,1,3,2]));
