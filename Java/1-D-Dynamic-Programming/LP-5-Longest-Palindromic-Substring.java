/*
5. Longest Palindromic Substring - Medium

Given a string s, return the longest palindromic substring in s.

Example 1:

Input: s = "babad"
Output: "bab"
Explanation: "aba" is also a valid answer.

Example 2:

Input: s = "cbbd"
Output: "bb"

Constraints:

1 <= s.length <= 1000
s consist of only digits and English letters.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(n^2)
 * Space Complexity - O(n)
 */

class Solution {

    public static String longestPalindrome(String s) {
        int n = s.length();
        String longest = "";
        String current;

        // check for odd strings
        for (int i=0; i<n; i++) {
            int l = i - 1;
            int r = i + 1;
            while (l >= 0 && r < n && s.charAt(l) == s.charAt(r)) {
                l--;
                r++;
            }

            current = s.substring(l+1, r);
            if (current.length() > longest.length()) {
                longest = current;
            }
        }

        // check for even strings
        for (int i=0; i<n; i++) {
            int l = i;
            int r = i + 1;
            while (l >= 0 && r < n && s.charAt(l) == s.charAt(r)) {
                l--;
                r++;
            }

            current = s.substring(l+1, r);
            if (current.length() > longest.length()) {
                longest = current;
            }
        }

        return longest;
    }

    public static void main(String[] args) {
        System.out.println(longestPalindrome("babad"));
        System.out.println(longestPalindrome("cbbd"));
        System.out.println(longestPalindrome("ccbs"));
    }
}
