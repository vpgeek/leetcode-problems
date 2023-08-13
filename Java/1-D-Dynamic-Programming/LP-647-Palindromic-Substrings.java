/*
647. Palindromic Substrings - Medium

Given a string s, return the number of palindromic substrings in it.

A string is a palindrome when it reads the same backward as forward.

A substring is a contiguous sequence of characters within the string.

Example 1:

Input: s = "abc"
Output: 3
Explanation: Three palindromic strings: "a", "b", "c".

Example 2:

Input: s = "aaa"
Output: 6
Explanation: Six palindromic strings: "a", "a", "a", "aa", "aa", "aaa".

Constraints:

1 <= s.length <= 1000
s consists of lowercase English letters.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(n^2)
 * Space Complexity - O(1)
 */

class Solution {
    public static int countSubstrings(String s) {
        int n = s.length();
        int count = n;

        // check for odd substrings
        for (int i=0; i<n; i++) {
            int l = i - 1;
            int r = i + 1;
            while (l >= 0 && r < n && s.charAt(l) == s.charAt(r)) {
                count++;
                l--;
                r++;
            }
        }

        // check for even substrings
        for (int i=0; i<n; i++) {
            int l = i;
            int r = i + 1;
            while (l >= 0 && r < n && s.charAt(l) == s.charAt(r)) {
                count++;
                l--;
                r++;
            }
        }

        return count;
    }

    public static void main(String[] args) {
        System.out.println(countSubstrings("abc"));
        System.out.println(countSubstrings("aaa"));
        System.out.println(countSubstrings(""));
    }

}
