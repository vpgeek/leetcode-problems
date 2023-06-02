<?php
/*
4. Median of Two Sorted Arrays - Hard

Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.

The overall run time complexity should be O(log (m+n)).

Example 1:

Input: nums1 = [1,3], nums2 = [2]
Output: 2.00000
Explanation: merged array = [1,2,3] and median is 2.

Example 2:

Input: nums1 = [1,2], nums2 = [3,4]
Output: 2.50000
Explanation: merged array = [1,2,3,4] and median is (2 + 3) / 2 = 2.5.
 
Constraints:

nums1.length == m
nums2.length == n
0 <= m <= 1000
0 <= n <= 1000
1 <= m + n <= 2000
-106 <= nums1[i], nums2[i] <= 106

*/

/**
 * Intuition:
 * 
 * Here's the intuition that helped me understand this. In this problem, we are searching for the "correct partition" in an array, such that,
 * 1. Number of elements in the merged array is (m+n) // 2
 * 2. All the elements in the left partition of both the arrays are lesser than or equal to all the elements in the right partition of both the arrays
 * 3. If ALeft > BRight --- shrink the partition
 * 4. If BLeft > ARight --- increase the partition
 * 
 * How do we know we can apply Binary search?
 * - We have a rule which can tell us if we should move to the right or to the left in the solution space
 * Here binary search can be run on any of the arrays, but we choose to run on the smaller one as it's more efficient
 */

/**
 * Big O Analysis:
 * Time Complexity - O(log(min(m, n)))
 * Space Complxity - O(m+n)
 *   
 */

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        // a => smaller array, b => larger array
        if (count($nums1) < count($nums2)) {
            $a = $nums1;
            $b = $nums2;
        } else {
            $a = $nums2;
            $b = $nums1;
        }

        $n = count($a);
        $m = count($b);
        $total = $n + $m;
        $half = floor($total / 2);

        $left = 0;
        $right = count($a) - 1;
        while (true) {
            $aMid = floor(($left + $right) /2);
            $bMid = $half - $aMid - 2; // get b middle index as it starts from 0

            // handle out of bound edge cases
            if ($aMid < 0) {
                $aLeft = PHP_INT_MIN;
            } else {
                $aLeft = $a[$aMid];
            }
            
            if (($aMid + 1) > ($n - 1)) {
                $aRight = PHP_INT_MAX;
            } else {
                $aRight = $a[$aMid + 1];
            }

            if ($bMid < 0) {
                $bLeft = PHP_INT_MIN;
            } else {
                $bLeft = $b[$bMid];
            }
            
            if (($bMid + 1) > ($m - 1)) {
                $bRight = PHP_INT_MAX;
            } else {
                $bRight = $b[$bMid + 1];
            }

            // left partition of a & b are less than or equal to a & b right partitions
            if (($aLeft <= $bRight) && ($bLeft <= $aRight)) {
                if ($total % 2 == 1) { // if total no of elements is odd
                    return min($aRight, $bRight);
                } else { // total no of elements is even
                    return ((max($aLeft, $bLeft) + min($aRight, $bRight)) / 2);
                }
            } else if ($aLeft > $bRight) { // shrink the left partition
                $right = $aMid - 1;
            } else { // increase the left partition
                $left = $aMid + 1;
            }
        }
    }
}

$s = new Solution();
// echo $s->findMedianSortedArrays([1,3], [2]);
echo $s->findMedianSortedArrays([2, 3], [1]);
