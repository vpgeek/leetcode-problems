/*
875. Koko Eating Bananas - Medium

Koko loves to eat bananas. There are n piles of bananas, the ith pile has piles[i] bananas. The guards have gone and will come back in h hours.

Koko can decide her bananas-per-hour eating speed of k. Each hour, she chooses some pile of bananas and eats k bananas from that pile. If the pile has less than k bananas, she eats all of them instead and will not eat any more bananas during this hour.

Koko likes to eat slowly but still wants to finish eating all the bananas before the guards return.

Return the minimum integer k such that she can eat all the bananas within h hours.

Example 1:
Input: piles = [3,6,7,11], h = 8
Output: 4

Example 2:
Input: piles = [30,11,23,4,20], h = 5
Output: 30

Example 3:
Input: piles = [30,11,23,4,20], h = 6
Output: 23
 
Constraints:

1 <= piles.length <= 104
piles.length <= h <= 109
1 <= piles[i] <= 109
*/

/*
Big O Analysis:
Time Complexity - O(n log max(p))
Space Compleity - O(1)

*/

import java.util.Arrays;

class Solution {

    public static void main(String[] args) {
        Solution s = new Solution();
        System.out.println(s.minEatingSpeed(new int[]{30,11,23,4,20}, 5));
    }

    public int minEatingSpeed(int[] piles, int h) {
        // set k to max possible no
        int k = Arrays.stream(piles).max().getAsInt();
        // k range should be [1, 2, 3, ..., max[piles]]
        int l = 1;
        int r = k;
        while (l <= r) {
            int mid = l + ((r - l) / 2);
            int hours = 0;
            for (int i=0; i<piles.length; i++) {
                // count no of hours to eat each pile with eating speed as mid val
                hours += (int)Math.ceil((double)piles[i] / mid);
            }
            if (hours <= h) {
                // decrease eating speed
                k = Math.min(k, mid);
                r = mid - 1;
            } else {
                // increase eating speed
                l = mid + 1;
            }
        }
        return k;
    }
}
