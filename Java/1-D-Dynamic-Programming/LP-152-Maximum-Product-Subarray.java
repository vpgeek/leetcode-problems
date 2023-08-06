/*
152. Maximum Product Subarray - Medium
Given an integer array nums, find a subarray that has the largest product, and return the product.

The test cases are generated so that the answer will fit in a 32-bit integer.

Example 1:

Input: nums = [2,3,-2,4]
Output: 6
Explanation: [2,3] has the largest product 6.

Example 2:

Input: nums = [-2,0,-1]
Output: 0
Explanation: The result cannot be 2, because [-2,-1] is not a subarray.

Constraints:

1 <= nums.length <= 2 * 104
-10 <= nums[i] <= 10
The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(n)
 * Space Complexity - O(1)
 */

class Solution {
    public static int maxProduct(int[] nums) {
        int maxProd = Integer.MIN_VALUE;
        int currentProd = 1;

        for (int i=0; i<nums.length; i++) {
            currentProd *= nums[i];
            maxProd = Math.max(maxProd, currentProd);
            if (currentProd == 0) {
                currentProd = 1;
            }
        }

        currentProd = 1;
        for (int i=nums.length-1; i>=0; i--) {
            currentProd *= nums[i];
            maxProd = Math.max(maxProd, currentProd);
            if (currentProd == 0) {
                currentProd = 1;
            }
        }
        
        return maxProd;
    }

    public static void main(String[] args) {
        System.out.println(maxProduct(new int[]{2,3,-2,4}));
        System.out.println(maxProduct(new int[]{-2,0,-1}));
    }

}
