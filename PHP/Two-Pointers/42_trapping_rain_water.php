<?php
/*
42. Trapping Rain Water - Hard

Given n non-negative integers representing an elevation map where the width of each bar is 1, compute how much water it can trap after raining.

Example 1:

Input: height = [0,1,0,2,1,0,1,3,2,1,2,1]
Output: 6
Explanation: The above elevation map (black section) is represented by array [0,1,0,2,1,0,1,3,2,1,2,1]. In this case, 6 units of rain water (blue section) are being trapped.

Example 2:

Input: height = [4,2,0,3,2,5]
Output: 9

Constraints:

n == height.length
1 <= n <= 2 * 104
0 <= height[i] <= 105
*/

/*

Analysis:
Time Complexity - O(n)
Space Complexity - O(1)

*/

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        $sum = $lmax = $rmax = 0;
        $l = 0;
        $r = count($height) - 1;
        while ($l < $r) {
            $lmax = max($lmax, $height[$l]);
            $rmax = max($rmax, $height[$r]);
            if ($lmax < $rmax) {
                $sum += $lmax - $height[$l];
                $l++;
            } else {
                $sum += $rmax - $height[$r];
                $r--;
            }
        }
        return $sum;
    }
}

$s = new Solution();
echo $s->trap([4,2,0,3,2,5]);
