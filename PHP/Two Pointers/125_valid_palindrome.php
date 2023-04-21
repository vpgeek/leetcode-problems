<?php
/*
125. Valid Palindrome - Easy

A phrase is a palindrome if, after converting all uppercase letters into lowercase letters and removing all non-alphanumeric characters, it reads the same forward and backward. Alphanumeric characters include letters and numbers.

Given a string s, return true if it is a palindrome, or false otherwise.

Example 1:
Input: s = "A man, a plan, a canal: Panama"
Output: true
Explanation: "amanaplanacanalpanama" is a palindrome.

Example 2:
Input: s = "race a car"
Output: false
Explanation: "raceacar" is not a palindrome.

Example 3:
Input: s = " "
Output: true
Explanation: s is an empty string "" after removing non-alphanumeric characters.
Since an empty string reads the same forward and backward, it is a palindrome.

*/

class Solution {

    /**
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     * 
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $s));
        $i = 0;
        $j = strlen($s)-1;

        while ($i < $j) {
            if ($s[$i] !== $s[$j]) {
                return 'false';
            } else {
                $i++;
                $j--;
            }
        }

        return 'true';
    }
}

$s = new Solution();
echo $s->isPalindrome('A man, a plan, a canal: Panama');
