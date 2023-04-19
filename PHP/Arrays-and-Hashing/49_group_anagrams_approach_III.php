<?php
/*
Approach III - using charcount as key

49. Group Anagrams - Medium

Given an array of strings strs, group the anagrams together. You can return the answer in any order.

An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, typically using all the original letters exactly once.

Example 1:

Input: strs = ["eat","tea","tan","ate","nat","bat"]
Output: [["bat"],["nat","tan"],["ate","eat","tea"]]
Example 2:

Input: strs = [""]
Output: [[""]]
Example 3:

Input: strs = ["a"]
Output: [["a"]]


Input: ["",""]
output: [["",""]]
*/

class Solution {

    /**
     * Time Complexity: O(nm), where n = size of array and m = max size of string
     * Space Complexity: O(nm), where n = size of array and m = max size of string
     * 
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $anagrams = [];
        for ($i=0; $i<count($strs); $i++) {
            // build key using char count of each string
            $char = array_fill(0, 26, 0);
            for ($j=0; $j<strlen($strs[$i]); $j++) {
                $char[ord($strs[$i][$j])-97]++;
            }
            $key = implode('c', $char);
            // group anagrams
            $anagrams[$key][] = $strs[$i];
        }

        return $anagrams;
    }
}

$s = new Solution();
print_r($s->groupAnagrams(["eat","tea","tan","ate","nat","bat"]));
