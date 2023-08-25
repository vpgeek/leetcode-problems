/*
72. Edit Distance - Medium

Given two strings word1 and word2, return the minimum number of operations required to convert word1 to word2.

You have the following three operations permitted on a word:

Insert a character
Delete a character
Replace a character

Example 1:

Input: word1 = "horse", word2 = "ros"
Output: 3
Explanation: 
horse -> rorse (replace 'h' with 'r')
rorse -> rose (remove 'r')
rose -> ros (remove 'e')

Example 2:

Input: word1 = "intention", word2 = "execution"
Output: 5
Explanation: 
intention -> inention (remove 't')
inention -> enention (replace 'i' with 'e')
enention -> exention (replace 'n' with 'x')
exention -> exection (replace 'n' with 'c')
exection -> execution (insert 'u')

Constraints:

0 <= word1.length, word2.length <= 500
word1 and word2 consist of lowercase English letters.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m*n), m = word1.length, n = word2.length
 * Space Complexity - O(m*n)
 */

import java.util.HashMap;
import java.util.Map;

class Solution {

    public static int minDistance(String word1, String word2) {
        return helper(word1, word2, word1.length(), word2.length(), new HashMap<>());
    }

    public static int helper(String word1, String word2, int i, int j, Map<String, Integer> dp) {
        if (i == 0) return j; // need to insert j chars
        if (j == 0) return i; // need to insert i chars

        String key = i + "->" + j;
        if (dp.containsKey(key)) {
            return dp.get(key);
        }

        if (word1.charAt(i-1) == word2.charAt(j-1)) {
            dp.put(key, helper(word1, word2, i-1, j-1, dp));
        } else {
            int delete = helper(word1, word2, i-1, j, dp);
            int replace = helper(word1, word2, i-1, j-1, dp);
            int insert = helper(word1, word2, i, j-1, dp);
            dp.put(key, 1 + Math.min(insert, Math.min(delete, replace)));
        }
        return dp.get(key);
    }

    public static int helperRecursive(String word1, String word2, int i, int j) {
        if (i == 0) return j; // need to insert j chars
        if (j == 0) return i; // need to insert i chars

        if (word1.charAt(i-1) == word2.charAt(j-1)) {
            return helperRecursive(word1, word2, i-1, j-1);
        } else {
            int delete = helperRecursive(word1, word2, i-1, j);
            int replace = helperRecursive(word1, word2, i-1, j-1);
            int insert = helperRecursive(word1, word2, i, j-1);
            return 1 + Math.min(insert, Math.min(delete, replace));
        }
    }

    public static void main(String[] args) {
        System.out.println(minDistance("horse", "ros"));
        System.out.println(minDistance("intention", "execution"));
    }

}
