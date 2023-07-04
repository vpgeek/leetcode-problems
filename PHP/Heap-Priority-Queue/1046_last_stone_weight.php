<?php
/*
1046. Last Stone Weight - Easy

You are given an array of integers stones where stones[i] is the weight of the ith stone.

We are playing a game with the stones. On each turn, we choose the heaviest two stones and smash them together. Suppose the heaviest two stones have weights x and y with x <= y. The result of this smash is:

If x == y, both stones are destroyed, and
If x != y, the stone of weight x is destroyed, and the stone of weight y has new weight y - x.
At the end of the game, there is at most one stone left.

Return the weight of the last remaining stone. If there are no stones left, return 0.

Example 1:

Input: stones = [2,7,4,1,8,1]
Output: 1
Explanation: 
We combine 7 and 8 to get 1 so the array converts to [2,4,1,1,1] then,
we combine 2 and 4 to get 2 so the array converts to [2,1,1,1] then,
we combine 2 and 1 to get 1 so the array converts to [1,1,1] then,
we combine 1 and 1 to get 0 so the array converts to [1] then that's the value of the last stone.

Example 2:

Input: stones = [1]
Output: 1
 
Constraints:

1 <= stones.length <= 30
1 <= stones[i] <= 1000
*/

/*
 * Big O Analysis
 * 
 * Time Complexity - n.logn
 * Space Complexity => n
 */

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $maxHeap = new SplMaxHeap();

        foreach ($stones as $i) {
            $maxHeap->insert($i);
        }

        while ($maxHeap->count() > 1) {
            $diff = $maxHeap->extract() - $maxHeap->extract();
            if ($diff > 0) {
                $maxHeap->insert($diff);
            }
        }

        return ($maxHeap->count() > 0) ? $maxHeap->extract() : 0;
    }
}

$s = new Solution();
echo $s->lastStoneWeight([2,7,4,1,8,1]);
