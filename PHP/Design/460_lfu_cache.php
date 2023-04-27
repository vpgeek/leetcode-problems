<?php
/*
460. LFU Cache - Hard
Design and implement a data structure for a Least Frequently Used (LFU) cache.

Implement the LFUCache class:

LFUCache(int capacity) Initializes the object with the capacity of the data structure.
int get(int key) Gets the value of the key if the key exists in the cache. Otherwise, returns -1.
void put(int key, int value) Update the value of the key if present, or inserts the key if not already present. When the cache reaches its capacity, it should invalidate and remove the least frequently used key before inserting a new item. For this problem, when there is a tie (i.e., two or more keys with the same frequency), the least recently used key would be invalidated.
To determine the least frequently used key, a use counter is maintained for each key in the cache. The key with the smallest use counter is the least frequently used key.

When a key is first inserted into the cache, its use counter is set to 1 (due to the put operation). The use counter for a key in the cache is incremented either a get or put operation is called on it.

The functions get and put must each run in O(1) average time complexity.

Example 1:

Input
["LFUCache", "put", "put", "get", "put", "get", "get", "put", "get", "get", "get"]
[[2], [1, 1], [2, 2], [1], [3, 3], [2], [3], [4, 4], [1], [3], [4]]
Output
[null, null, null, 1, null, -1, 3, null, -1, 3, 4]

Explanation
// cnt(x) = the use counter for key x
// cache=[] will show the last used order for tiebreakers (leftmost element is  most recent)
LFUCache lfu = new LFUCache(2);
lfu.put(1, 1);   // cache=[1,_], cnt(1)=1
lfu.put(2, 2);   // cache=[2,1], cnt(2)=1, cnt(1)=1
lfu.get(1);      // return 1
                 // cache=[1,2], cnt(2)=1, cnt(1)=2
lfu.put(3, 3);   // 2 is the LFU key because cnt(2)=1 is the smallest, invalidate 2.
                 // cache=[3,1], cnt(3)=1, cnt(1)=2
lfu.get(2);      // return -1 (not found)
lfu.get(3);      // return 3
                 // cache=[3,1], cnt(3)=2, cnt(1)=2
lfu.put(4, 4);   // Both 1 and 3 have the same cnt, but 1 is LRU, invalidate 1.
                 // cache=[4,3], cnt(4)=1, cnt(3)=2
lfu.get(1);      // return -1 (not found)
lfu.get(3);      // return 3
                 // cache=[3,4], cnt(4)=1, cnt(3)=3
lfu.get(4);      // return 4
                 // cache=[4,3], cnt(4)=2, cnt(3)=3

Constraints:

1 <= capacity <= 104
0 <= key <= 105
0 <= value <= 109
At most 2 * 105 calls will be made to get and put.

*/

class LFUCache {
    public $cacheArr;
    public $counter;
    public $capacity;
    public $minFrequency;

    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->cacheArr = [];
        $this->counter = [];
        $this->capacity = $capacity;
        $this->minFrequency = 1;
    }

    /**
     * Time Complexity: O(1)
     * Overall Space Complexity: O(n)
     * 
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (isset($this->cacheArr[$key])) {
            $frequency = $this->cacheArr[$key][1];
            $this->removeKeyFromCounter($frequency, false, $key);
            $frequency++;
            $this->cacheArr[$key][1] = $frequency;
            $this->addKeyToCounter($key, $frequency);
            $this->updateMinFrequency($frequency);
            return $this->cacheArr[$key][0];
        }
        return -1;
    }

    /**
     * Time Complexity: O(1)
     * Overall Space Complexity: O(n)
     * 
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        // update key-value
        if (isset($this->cacheArr[$key])) {
            // delete key from old frequency list and update to new frequency list
            $frequency = $this->cacheArr[$key][1];
            $this->removeKeyFromCounter($frequency, false, $key);
            // update frequency of key
            $frequency++;
            $this->insertKeyValueInCache($key, $value, $frequency);
            return;
        }

        // insert key-value
        if (count($this->cacheArr) < $this->capacity) {
            $frequency = 1;
            $this->insertKeyValueInCache($key, $value, $frequency);
        } else {
            // evict lfu key-value & insert
            $invalidKey = $this->removeKeyFromCounter($this->minFrequency);
            unset($this->cacheArr[$invalidKey]);
            $frequency = 1;
            $this->insertKeyValueInCache($key, $value, $frequency);
        }

        return;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function insertKeyValueInCache($key, $value, $frequency) {
        $this->addKeyToCounter($key, $frequency);
        $this->cacheArr[$key] = [$value, $frequency];
        $this->updateMinFrequency($frequency);
        return;
    }

    /**
     * @param Integer $frequency
     * @param Boolean $evict
     * @param Integer $key
     * @return Integer
     */
    function removeKeyFromCounter($frequency, $evict=true, $key=null) {
        $removedKey = null;
        if ($evict == true) {
            $first = array_key_first($this->counter[$frequency]);
            $removedKey = $this->counter[$frequency][$first];
            unset($this->counter[$frequency][$first]);
        } else {
            foreach ($this->counter[$frequency] as $k => $v) {
                if ($v == $key) {
                    unset($this->counter[$frequency][$k]);
                    break;
                }
            }
        }

        if (count($this->counter[$frequency]) == 0) {
            unset($this->counter[$frequency]);
        }
        return $removedKey;
    }

    /**
     * @param Integer $key
     * @param Integer $frequency
     * @return NULL
     */
    function addKeyToCounter($key, $frequency) {
        if (isset($this->counter[$frequency])) {
            $this->counter[$frequency][] = $key;
        } else {
            $this->counter[$frequency] = [$key];
        }
        return;
    }

    /**
     * @param Integer $frequency
     * @return NULL
     */
    function updateMinFrequency($frequency) {
        if (!isset($this->counter[$this->minFrequency]) || ($this->minFrequency > $frequency)) {
            $this->minFrequency = $frequency;
        }
        return;
    }
}

$lfu = new LFUCache(2);
$lfu->put(1, 1);
$lfu->put(2, 2);
echo $lfu->get(1) . '<br/>';
$lfu->put(3, 3);
echo $lfu->get(2) . '<br/>';
echo $lfu->get(3) . '<br/>';
$lfu->put(4, 4);
echo $lfu->get(1) . '<br/>';
echo $lfu->get(3) . '<br/>';
echo $lfu->get(4) . '<br/>';

// $lfu = new LFUCache(2);
// $lfu->put(3, 1);
// $lfu->put(2, 1);
// $lfu->put(2, 2);
// $lfu->put(4, 4);
// echo $lfu->get(2) . '<br/>';
