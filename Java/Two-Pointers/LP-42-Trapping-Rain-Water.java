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
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(n) 
 */

class Solution {

    static int trap(int[] height) {
        int n = height.length;

        int[] leftHeight = new int[n];
        int leftMax = height[0];
        for (int i=0; i<n; i++) {
            leftHeight[i] = leftMax;
            leftMax = Math.max(leftMax, height[i]);
        }

        int[] rightHeight = new int[n];
        int rightMax = height[n-1];
        for (int i=n-1; i>=0; i--) {
            rightHeight[i] = rightMax;
            rightMax = Math.max(rightMax, height[i]);
        }

        int waterCount = 0;
        for (int i=0; i<n; i++) {
            waterCount += Math.max(0, Math.min(leftHeight[i], rightHeight[i]) - height[i]); // avoid negative values
        }

        return waterCount;
    }

    public static void main(String[] args) {
        int[] height = {0,1,0,2,1,0,1,3,2,1,2,1};
        System.out.println(trap(height));
    }

}
