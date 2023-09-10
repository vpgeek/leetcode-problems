/*
424. Longest Repeating Character Replacement - Medium

You are given a string s and an integer k. You can choose any character of the string and change it to any other uppercase English character. You can perform this operation at most k times.

Return the length of the longest substring containing the same letter you can get after performing the above operations.

Example 1:

Input: s = "ABAB", k = 2
Output: 4
Explanation: Replace the two 'A's with two 'B's or vice versa.

Example 2:

Input: s = "AABABBA", k = 1
Output: 4
Explanation: Replace the one 'A' in the middle with 'B' and form "AABBBBA".
The substring "BBBB" has the longest repeating letters, which is 4.
There may exists other ways to achive this answer too.

Constraints:

1 <= s.length <= 105
s consists of only uppercase English letters.
0 <= k <= s.length

*/

/*
 * Big O Analysis
 * 
 * Time Complexity - O(26 . n) => O(n)
 * Space Complexity - O(26) => O(1)
 */

import java.util.Collections;
import java.util.HashMap;
import java.util.Map;

class Solution {

    public static int characterReplacement(String s, int k) {
        Map<Character, Integer> map = new HashMap<>();
        int max = 0;
        int i = 0;
        for (int j=0; j<s.length(); j++) {
            map.put(s.charAt(j), map.getOrDefault(s.charAt(j), 0) + 1);
            int maxFreq = Collections.max(map.values());
            // check for valid substring
            int subStringLength = j-i+1;
            if (subStringLength - maxFreq <= k) {
                // valid substring, expand window
                max = Math.max(max, subStringLength);
            } else {
                // invalid substring, shrink window
                map.put(s.charAt(i), map.get(s.charAt(i)) - 1);
                i++;
            }
        }
        return max;
    }

    public static int characterReplacementBruteForce(String s, int k) {
        int max = 0;
        for (int i=0; i<s.length(); i++) {
            for (int j=i; j<s.length(); j++) {
                String subString = s.substring(i, j+1);
                if (isValidSubString(subString, k)) {
                    max = Math.max(max, subString.length());
                }
            }
        }

        return max;
    }

    public static boolean isValidSubString(String str, int k) {
        Map<Character, Integer> freq = new HashMap<>();
        for (char c : str.toCharArray()) {
            freq.put(c, freq.getOrDefault(c, 0) + 1);
        }
        int maxFreq = Collections.max(freq.values());
        return (str.length() - maxFreq <= k) ? true : false;
    }

    public static void main(String[] args) {
        System.out.println(characterReplacement("ABAB", 2));
        System.out.println(characterReplacement("AABABBA", 1));
    }

}
