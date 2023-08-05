/* 
139. Word Break - Medium

Given a string s and a dictionary of strings wordDict, return true if s can be segmented into a space-separated sequence of one or more dictionary words.

Note that the same word in the dictionary may be reused multiple times in the segmentation.

Example 1:

Input: s = "leetcode", wordDict = ["leet","code"]
Output: true
Explanation: Return true because "leetcode" can be segmented as "leet code".

Example 2:

Input: s = "applepenapple", wordDict = ["apple","pen"]
Output: true
Explanation: Return true because "applepenapple" can be segmented as "apple pen apple".
Note that you are allowed to reuse a dictionary word.

Example 3:

Input: s = "catsandog", wordDict = ["cats","dog","sand","and","cat"]
Output: false

Constraints:

1 <= s.length <= 300
1 <= wordDict.length <= 1000
1 <= wordDict[i].length <= 20
s and wordDict[i] consist of only lowercase English letters.
All the strings of wordDict are unique.

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(m.n.m) => O(m^2 n), m => length of string, n = size of word list
 * Space Complexity - O(m), for dp array
 */

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

class Solution {
    public static boolean wordBreak(String s, List<String> wordDict) {
        int m = s.length();
        boolean dp[] = new boolean[m+1];
        dp[0] = true;
        for (int i=1; i<=m; i++) {
            if (dp[i-1] == true) {
                for (String word : wordDict) {
                    int k = i-1; // reduce one index since string starts from 0
                    if ((k+word.length() <= m) && (s.substring(k, k+word.length()).equals(word))) {
                        dp[k+word.length()] = true;
                    }
                }
            }
        }

        return dp[m];
    }

    public static void main(String[] args) {
        System.out.println(wordBreak("leetcode", new ArrayList<>(Arrays.asList("leet","code"))));
        System.out.println(wordBreak("applepen", new ArrayList<>(Arrays.asList("pen","apple"))));
        System.out.println(wordBreak("catsandog", new ArrayList<>(Arrays.asList("cats","dog","sand","and","cat"))));
    }
}
