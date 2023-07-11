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

/**
 * Big O Analysis:
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(n)
 */

import java.util.HashSet;
import java.util.Set;

class Solution {

    public static int longestConsecutive(int[] nums) {
        int longest = 0;

        // convert array to hashset
        Set<Integer> set = new HashSet<>();
        for (int i : nums) {
            set.add(i);
        }

        for (int i : nums) {
            if (set.contains(i-1)) {
                continue;
            }

            int longer = 1;
            while (set.contains(++i)) {
                longer++;
            }

            longest = Math.max(longest, longer);
        }

        return longest;
    }

    public static void main(String[] args) {
        System.out.println(longestConsecutive(new int[]{100,4,200,1,3,2}));
    }

}
