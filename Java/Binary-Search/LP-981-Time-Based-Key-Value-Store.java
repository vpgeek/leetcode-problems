/*
981. Time Based Key-Value Store - Medium

Design a time-based key-value data structure that can store multiple values for the same key at different time stamps and retrieve the key's value at a certain Node.

Implement the TimeMap class:

TimeMap() Initializes the object of the data structure.
void set(String key, String value, int Node) Stores the key key with the value value at the given time Node.
String get(String key, int Node) Returns a value such that set was called previously, with Node_prev <= Node. If there are multiple such values, it returns the value associated with the largest Node_prev. If there are no values, it returns "".
 
Example 1:

Input
["TimeMap", "set", "get", "get", "set", "get", "get"]
[[], ["foo", "bar", 1], ["foo", 1], ["foo", 3], ["foo", "bar2", 4], ["foo", 4], ["foo", 5]]
Output
[null, null, "bar", "bar", null, "bar2", "bar2"]

Explanation
TimeMap timeMap = new TimeMap();
timeMap.set("foo", "bar", 1);  // store the key "foo" and value "bar" along with Node = 1.
timeMap.get("foo", 1);         // return "bar"
timeMap.get("foo", 3);         // return "bar", since there is no value corresponding to foo at Node 3 and Node 2, then the only value is at Node 1 is "bar".
timeMap.set("foo", "bar2", 4); // store the key "foo" and value "bar2" along with Node = 4.
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
1 <= Node <= 107
All the Nodes Node of set are strictly increasing.
At most 2 * 105 calls will be made to set and get.
*/

/*
Big O Analysis:

n no of keys stored and m no of Nodes for a key stored in hashmap

function set():
Time Complexity - O(1)
Space Complexity - O(m) // arraylist for storing node array for a key

function get():
Time Complexity - O(log m)
Space Complexity - O(m) // using extra memory to store Node array for a key to search

*/

import java.util.*;
class Node {
    int timestamp;
    String val;

    public Node(int timestamp, String val) {
        this.timestamp = timestamp;
        this.val = val;
    }
}

class TimeMap {

    HashMap<String, List<Node>> map;

    public TimeMap() {
        map = new HashMap<>();
    }
    
    public void set(String key, String value, int timestamp) {
        Node node = new Node(timestamp, value);
        if(! map.containsKey(key)) {
            map.put(key, new ArrayList<>());
        }
        map.get(key).add(node);
    }
    
    public String get(String key, int timestamp) {
        List<Node> list = map.get(key);
        if(list == null) {
            return "";
        }
        return getMaxTimeStampValue(list, timestamp);
    }

    public String getMaxTimeStampValue(List<Node> list, int timestamp) {
        int left = 0;
        int right = list.size() - 1;
        while(left <= right) {
            int mid = (left + right) / 2;
            if(list.get(mid).timestamp == timestamp) {
                return list.get(mid).val;
            } else if (timestamp < list.get(mid).timestamp) {
                right = mid - 1;
            } else {
                left = mid + 1;
            }
        }

        if(left == 0) {
            return "";
        }

        return list.get(left - 1).val;
    }

    public static void main(String[] args) {
        TimeMap obj = new TimeMap();
        obj = new TimeMap();
        obj.set("love","high",10);
        obj.set("love","low",20);
        System.out.println(obj.get("love",5));
        System.out.println(obj.get("love",10));
        System.out.println(obj.get("love",15));
        System.out.println(obj.get("love",20));
        System.out.println(obj.get("love",25));
    }
}
