/*
97. Interleaving String - Medium

Given strings s1, s2, and s3, find whether s3 is formed by an interleaving of s1 and s2.

An interleaving of two strings s and t is a configuration where s and t are divided into n and m 
substrings respectively, such that:

s = s1 + s2 + ... + sn
t = t1 + t2 + ... + tm
|n - m| <= 1
The interleaving is s1 + t1 + s2 + t2 + s3 + t3 + ... or t1 + s1 + t2 + s2 + t3 + s3 + ...
Note: a + b is the concatenation of strings a and b.

Example 1:

Input: s1 = "aabcc", s2 = "dbbca", s3 = "aadbbcbcac"
Output: true
Explanation: One way to obtain s3 is:
Split s1 into s1 = "aa" + "bc" + "c", and s2 into s2 = "dbbc" + "a".
Interleaving the two splits, we get "aa" + "dbbc" + "bc" + "a" + "c" = "aadbbcbcac".
Since s3 can be obtained by interleaving s1 and s2, we return true.

Example 2:

Input: s1 = "aabcc", s2 = "dbbca", s3 = "aadbbbaccc"
Output: false
Explanation: Notice how it is impossible to interleave s2 with any other string to obtain s3.

Example 3:

Input: s1 = "", s2 = "", s3 = ""
Output: true

Constraints:

0 <= s1.length, s2.length <= 100
0 <= s3.length <= 200
s1, s2, and s3 consist of lowercase English letters.

Follow up: Could you solve it using only O(s2.length) additional memory space?

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m*n), m = s1.length, n = s2.length
 * Space Complexity - O(m*n)
 */

import java.util.HashMap;
import java.util.Map;

class Solution {
    public static boolean isInterleave(String s1, String s2, String s3) {
        if (s1.length() + s2.length() != s3.length()) return false;
        return helper(s1, s2, s3, 0, 0, new HashMap<>());
    }

    public static boolean helper(String s1, String s2, String s3, int i, int j, Map<String, Boolean> dp) {
        if (i == s1.length() && j == s2.length()) {
            return true;
        }

        String key = i + "->" + j;
        if (dp.containsKey(key)) {
            return dp.get(key);
        }

        boolean val;
        if (i < s1.length() && s1.charAt(i) == s3.charAt(i+j) && j < s2.length() && s2.charAt(j) == s3.charAt(i+j)) {
            val = helper(s1, s2, s3, i+1, j, dp) || helper(s1, s2, s3, i, j+1, dp);
        } else if (i < s1.length() && s1.charAt(i) == s3.charAt(i+j)) {
            val = helper(s1, s2, s3, i+1, j, dp);
        } else if (j < s2.length() && s2.charAt(j) == s3.charAt(i+j)) {
            val = helper(s1, s2, s3, i, j+1, dp);
        } else {
            val = false;
        }
        dp.put(key, val);
        return val;
    }

    public static boolean helperRecursive(String s1, String s2, String s3, int i, int j) {
        if (i == s1.length() && j == s2.length()) {
            return true;
        }

        if (i < s1.length() && s1.charAt(i) == s3.charAt(i+j) && j < s2.length() && s2.charAt(j) == s3.charAt(i+j)) {
            return (helperRecursive(s1, s2, s3, i+1, j) || helperRecursive(s1, s2, s3, i, j+1));
        } else if (i < s1.length() && s1.charAt(i) == s3.charAt(i+j)) {
            return helperRecursive(s1, s2, s3, i+1, j);
        } else if (j < s2.length() && s2.charAt(j) == s3.charAt(i+j)) {
            return helperRecursive(s1, s2, s3, i, j+1);
        } else {
            return false;
        }
    }

    public static void main(String[] args) {
        System.out.println(isInterleave("aabcc", "dbbca", "aadbbcbcac"));
        System.out.println(isInterleave("aabcc", "dbbca", "aadbbbaccc"));
        System.out.println(isInterleave("", "", ""));
    }
}
