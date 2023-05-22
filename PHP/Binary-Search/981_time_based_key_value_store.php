<?php
/*
981. Time Based Key-Value Store - Medium

Design a time-based key-value data structure that can store multiple values for the same key at different time stamps and retrieve the key's value at a certain timestamp.

Implement the TimeMap class:

TimeMap() Initializes the object of the data structure.
void set(String key, String value, int timestamp) Stores the key key with the value value at the given time timestamp.
String get(String key, int timestamp) Returns a value such that set was called previously, with timestamp_prev <= timestamp. If there are multiple such values, it returns the value associated with the largest timestamp_prev. If there are no values, it returns "".
 
Example 1:

Input
["TimeMap", "set", "get", "get", "set", "get", "get"]
[[], ["foo", "bar", 1], ["foo", 1], ["foo", 3], ["foo", "bar2", 4], ["foo", 4], ["foo", 5]]
Output
[null, null, "bar", "bar", null, "bar2", "bar2"]

Explanation
TimeMap timeMap = new TimeMap();
timeMap.set("foo", "bar", 1);  // store the key "foo" and value "bar" along with timestamp = 1.
timeMap.get("foo", 1);         // return "bar"
timeMap.get("foo", 3);         // return "bar", since there is no value corresponding to foo at timestamp 3 and timestamp 2, then the only value is at timestamp 1 is "bar".
timeMap.set("foo", "bar2", 4); // store the key "foo" and value "bar2" along with timestamp = 4.
timeMap.get("foo", 4);         // return "bar2"
timeMap.get("foo", 5);         // return "bar2"

Example 2:

["TimeMap","set","set","get","get","get","get","get"]
[[],["love","high",10],["love","low",20],["love",5],["love",10],["love",15],["love",20],["love",25]]

output:
[null,null,null,,"high","high","low","low"]

expected:
[null,null,null,"","high","high","low","low"]


Constraints:

1 <= key.length, value.length <= 100
key and value consist of lowercase English letters and digits.
1 <= timestamp <= 107
All the timestamps timestamp of set are strictly increasing.
At most 2 * 105 calls will be made to set and get.
*/

/*
Big O Analysis:

n no of keys stored and m no of timestamps for a key stored in hashmap

function set():
Time Complexity - O(1)
Space Complexity - O(1)

function get():
Time Complexity - O(log m)
Space Complexity - O(m) // using extra memory to store timestamp array for a key to search

*/

class TimeMap {
    /**
     */
    function __construct() {
        $this->map = [];
    }
  
    /**
     * @param String $key
     * @param String $value
     * @param Integer $timestamp
     * @return NULL
     */
    function set($key, $value, $timestamp) {
        $this->map[$key][$timestamp] = $value;
    }
  
    /**
     * @param String $key
     * @param Integer $timestamp
     * @return String
     */
    function get($key, $timestamp) {
        if (! isset($this->map[$key])) {
            return '';
        }

        $timestampArray = array_keys($this->map[$key]);
        $maxTimestamp = $this->getMaxTimestamp($timestampArray, $timestamp);
        return isset($this->map[$key][$maxTimestamp]) ? $this->map[$key][$maxTimestamp] : '';
    }

    /**
     * @param Integer[] $timestampArray
     * @param Integer $timestamp
     * @return Integer
     */
    function getMaxTimestamp($timestampArray, $timestamp) {
        $l = 0;
        $r = count($timestampArray) - 1;
        while ($l <= $r) {
            $m = floor(($l + $r) / 2);
            if ($timestamp == $timestampArray[$m]) {
                return $timestampArray[$m];
            } elseif ($timestamp < $timestampArray[$m]) {
                $r = $m - 1;
            } else {
                $l = $m + 1;
            }
        }
        if ($l == 0) {
            return '';
        }
        return $timestampArray[$l - 1];
    }
}

// $tm = new TimeMap();
// $tm->set('foo', 'bar', 1);
// $tm->set('boo', 'zoo', 3);
// $tm->set('foo', 'bar2', 5);
// echo $tm->get('foo', 6);

$tm = new TimeMap();
$tm->set("love","high",10);
$tm->set("love","low",20);
echo $tm->get("love",5);
echo $tm->get("love",10);
echo $tm->get("love",15);
echo $tm->get("love",20);
echo $tm->get("love",25);
