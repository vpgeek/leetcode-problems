<?php
/*
347. Top K Frequent Elements - Medium
Approach II - using bucket sort in linear time

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
     * Using bucket sort
     * 
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     * 
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $hash = [];
        for ($i=0; $i<count($nums); $i++) {
            $hash[$nums[$i]] = isset($hash[$nums[$i]]) ? $hash[$nums[$i]] + 1 : 1;
        }

        $freq = array_fill(1, count($nums), []);
        foreach($hash as $key => $v) {
            $freq[$v][] = $key;
        }

        $res = [];
        for ($i=count($freq); $i>0; $i--) {
            if ($nums == null) continue;
            for ($j=0; $j<count($freq[$i]); $j++) {
                if ($k == 0) return $res;
                $res[] = $freq[$i][$j];
                $k--;
            }
        }
        return $res;
    }
}

$s = new Solution();
print_r($s->topKFrequent([1,1,1,2,2,2,3,3,4], 2));
