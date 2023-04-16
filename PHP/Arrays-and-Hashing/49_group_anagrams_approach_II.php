<?php
/*
Approach II - using sort

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
     * Time Complexity: O(n mlogm), where n = size of array and m = max size of string
     * Space Complexity: O(nm), where n = size of array and m = max size of string
     * 
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $anagram = [];
        for ($i=0; $i<count($strs); $i++) {
            $char_arr = str_split($strs[$i]);
            sort($char_arr);
            $key = implode($char_arr);

            if (isset($anagram[$key])) {
                $anagram[$key][] = $strs[$i];
            } else {
                $anagram[$key] = [$strs[$i]];
            }
        }

        return array_values($anagram);
    }
}

$s = new Solution();
print_r($s->groupAnagrams(["eat","tea","tan","ate","nat","bat"]));
