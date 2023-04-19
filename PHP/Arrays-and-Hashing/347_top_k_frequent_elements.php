<?php
/*
347. Top K Frequent Elements - Medium
Approach I - using sort

Given an integer array nums and an integer k, return the k most frequent elements. You may return the answer in any order.

Example 1:

Input: nums = [1,1,1,2,2,3], k = 2
Output: [1,2]
Example 2:

Input: nums = [1], k = 1
Output: [1]

Follow up: Your algorithm's time complexity must be better than O(n log n), where n is the array's size.

*/

class Solution {

    /**
     * Using sort
     * 
     * Time Complexity: O(nlogn)
     * Space Complexity: O(n)
     * 
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        for ($i=0; $i<count($nums); $i++) {
            isset($hash[$nums[$i]]) ? $hash[$nums[$i]]++ : $hash[$nums[$i]] = 1;
        }
        arsort($hash);
        return array_keys(array_slice($hash, 0, $k, true));
    }
}

$s = new Solution();
print_r($s->topKFrequent([1,1,1,2,2,2,3,3,4], 2));
