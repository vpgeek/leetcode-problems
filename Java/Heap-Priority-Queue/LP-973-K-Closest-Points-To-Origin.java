/*
973. K Closest Points to Origin - Medium

Given an array of points where points[i] = [xi, yi] represents a point on the X-Y plane and an integer k, return the k closest points to the origin (0, 0).

The distance between two points on the X-Y plane is the Euclidean distance (i.e., √(x1 - x2)2 + (y1 - y2)2).

You may return the answer in any order. The answer is guaranteed to be unique (except for the order that it is in).

Example 1:

Input: points = [[1,3],[-2,2]], k = 1
Output: [[-2,2]]
Explanation:
The distance between (1, 3) and the origin is sqrt(10).
The distance between (-2, 2) and the origin is sqrt(8).
Since sqrt(8) < sqrt(10), (-2, 2) is closer to the origin.
We only want the closest k = 1 points from the origin, so the answer is just [[-2,2]].

Example 2:

Input: points = [[3,3],[5,-1],[-2,4]], k = 2
Output: [[3,3],[-2,4]]
Explanation: The answer [[-2,4],[3,3]] would also be accepted.

Constraints:

1 <= k <= points.length <= 104
-104 < xi, yi < 104

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - n logk, n = no of elements, k = heap size
 * Space Complexity => k
 */

import java.util.Arrays;
import java.util.PriorityQueue;

class Solution {
    public int[][] kClosest(int[][] points, int k) {
        PriorityQueue<int[]> maxHeap = new PriorityQueue<>((p1, p2) -> ((p2[0] * p2[0]) + (p2[1] * p2[1])) - ((p1[0] * p1[0]) + (p1[1] * p1[1])));
        int[][] result = new int[k][2];
        
        for (int i=0; i<points.length; i++) {
            maxHeap.add(points[i]);
            if (maxHeap.size() > k) {
                maxHeap.poll();
            }
        }

        for (int i=0; i<k; i++) {
            result[i] = maxHeap.poll();
        }

        return result;
    }

    public static void main(String[] args) {
        Solution s = new Solution();
        int[][] result = s.kClosest(new int[][]{{0,1},{1,0}}, 2);
        System.out.println(Arrays.deepToString(result));
    }
}
