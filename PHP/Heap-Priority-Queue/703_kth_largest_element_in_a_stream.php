<?php
/*
703. Kth Largest Element in a Stream - Easy

Design a class to find the kth largest element in a stream. Note that it is the kth largest element in the sorted order, not the kth distinct element.

Implement KthLargest class:

KthLargest(int k, int[] nums) Initializes the object with the integer k and the stream of integers nums.
int add(int val) Appends the integer val to the stream and returns the element representing the kth largest element in the stream.
 

Example 1:

Input
["KthLargest", "add", "add", "add", "add", "add"]
[[3, [4, 5, 8, 2]], [3], [5], [10], [9], [4]]
Output
[null, 4, 5, 5, 8, 8]

Explanation
KthLargest kthLargest = new KthLargest(3, [4, 5, 8, 2]);
kthLargest.add(3);   // return 4
kthLargest.add(5);   // return 5
kthLargest.add(10);  // return 5
kthLargest.add(9);   // return 8
kthLargest.add(4);   // return 8
 

Constraints:

1 <= k <= 104
0 <= nums.length <= 104
-104 <= nums[i] <= 104
-104 <= val <= 104
At most 104 calls will be made to add.
It is guaranteed that there will be at least k elements in the array when you search for the kth element.
*/

/*
 * Big O Analysis
 * 
 * Time Complexity
 *  - constructor => (n + n logK) => n.logk , n = no of elements in stream, k = heap size
 *  - add => (logk + log k) => 2 logk => logk
 * 
 * Space Complexity => k , heap size 
 */

class KthLargest {

    public $k;
    public $heap;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->heap = new SplMinHeap();
        $this->k = $k;

        // convert array to heap
        foreach ($nums as $n) {
            $this->add($n);
        }
    }
  
    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        $this->heap->insert($val);
        if ($this->heap->count() > $this->k) {
            $this->heap->extract();
        }

        return $this->heap->top();
    }
}

$obj = new KthLargest(3, [4, 5, 8, 2]);
echo $obj->add(3) . '<br/>';
echo $obj->add(5) . '<br/>';
echo $obj->add(10) . '<br/>';
echo $obj->add(9) . '<br/>';
echo $obj->add(4) . '<br/>';
