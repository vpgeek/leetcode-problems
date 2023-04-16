<?php
/*
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
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $anagram = [];
        $x = $y = 0;
        for ($i=0; $i<count($strs); $i++) {
            $y = 0;
            if ($strs[$i] != 0) {
                $anagram[$x][$y] = $strs[$i];

                // build hash table for the string
                $hash = $this->buildHash($strs[$i]);

                // check every string against hash to find anagram
                for ($j=$i+1; $j<count($strs); $j++) {
                    if (strlen($strs[$i]) != strlen($strs[$j])) {
                        continue;
                    }

                    if (($strs[$i] == '' && $strs[$j] == '') || ($this->isAnagram($strs[$j], $hash))) {
                        $anagram[$x][++$y] = $strs[$j];
                        $strs[$j] = 0;
                    }
                }
                $strs[$i] = 0;
                $x++;
            }
        }

        return $anagram;
    }


    /**
     * @param String $s
     * @return []
     */
    function buildHash($s) {
        $hash = [];
        for($i=0; $i<strlen($s); $i++) {
            if (isset($hash[$s[$i]])) {
                $hash[$s[$i]]++;
            } else {
                $hash[$s[$i]] = 1;
            }
        }

        return $hash;
    }

    /**
     * @param String $s
     * @param Array[]
     * @return boolean
     */
    function isAnagram($s, $hash) {
        for($i=0; $i<strlen($s); $i++) {
            if (isset($hash[$s[$i]])) {
                $hash[$s[$i]]--;
            } else {
                return false;
            }
        }

        foreach($hash as $key => $val) {
            if ($hash[$key] !=0) {
                return false;
            }
        }

        return true;
    }
}

$s = new Solution();
print_r($s->groupAnagrams(["eat","tea","tan","ate","nat","bat"]));
// print_r($s->groupAnagrams([""]));
