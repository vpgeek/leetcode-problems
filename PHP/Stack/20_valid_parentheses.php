<?php
/*
20. Valid Parentheses - Easy

Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

An input string is valid if:

Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.
Every close bracket has a corresponding open bracket of the same type.

Example 1:
Input: s = "()"
Output: true

Example 2:
Input: s = "()[]{}"
Output: true

Example 3:
Input: s = "(]"
Output: false

*/

class Solution {

    /**
     * Time Complexity: O(n)
     * Space Complexity: O(n)
     * 
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $stack = [];
        for($i=0; $i<strlen($s); $i++) {

            // push into stack if the char is an open parenthesis
            if ($s[$i] == '(' || $s[$i] == '{' || $s[$i] == '[') {
                array_push($stack, $s[$i]);
            }

            // pop the stack and check if the char is a closing parethesis
            if ($s[$i] == ')' || $s[$i] == '}' || $s[$i] == ']') {

                if (count($stack) == 0) {
                    return false;
                }

                $c = array_pop($stack);
                if (($s[$i] == ')' && $c != '(') || ($s[$i] == '}' && $c != '{') || ($s[$i] == ']' && $c != '[')) {
                    return false;
                }
            }
        }

        return (count($stack)==0) ? true : false;
    }
}

$s = new Solution();
var_dump($s->checkParenthesis('(]'));
