<?php
/*
11. Container With Most Water - Medium

You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line are (i, 0) and (i, height[i]).

Find two lines that together with the x-axis form a container, such that the container contains the most water.

Return the maximum amount of water a container can store.

Notice that you may not slant the container.

Example 1:

Input: height = [1,8,6,2,5,4,8,3,7]
Output: 49
Explanation: The above vertical lines are represented by array [1,8,6,2,5,4,8,3,7]. In this case, the max area of water (blue section) the container can contain is 49.

Example 2:

Input: height = [1,1]
Output: 1

Constraints:

n == height.length
2 <= n <= 105
0 <= height[i] <= 104

*/

/*

Analysis:
Time Complexity - O(n) linear time
Space Complexity - O(1) constant space

*/

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $max = 0;
        $l = 0;
        $r = count($height) - 1;
        while ($l < $r) {
            // find area between two heights
            $area = ($r - $l) * min($height[$l], $height[$r]);
            $max = max($max, $area);
            if ($height[$l] < $height[$r]) {
                $l++;
            } else {
                $r--;
            }
        }
        return $max;
    }
}

$s = new Solution();
echo $s->maxArea([1,8,6,2,5,4,8,3,7]);
