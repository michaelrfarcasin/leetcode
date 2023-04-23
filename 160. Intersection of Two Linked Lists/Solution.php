<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Lengths {
    public $a = 0;
    public $b = 0;
    public function __construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }
}

class Solution {
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     * @source https://leetcode.com/problems/intersection-of-two-linked-lists/solutions/3379000/beats-96-time-and-100-space-complexities/
     */
    function getIntersectionNode($headA, $headB) {
        $lengths = $this->getLengthsOfLists($headA, $headB);
        return $this->findIntersectionNodeForListsWithLengths($headA, $headB, $lengths);
    }

    private function getLengthsOfLists($headA, $headB) {
        $lengthA = 0;
        $lengthB = 0;
        $walkerA = $headA;
        $walkerB = $headB;
        while ($walkerA || $walkerB) {
            if ($walkerA) {
                $walkerA = $walkerA->next;
                $lengthA++;
            }
            if ($walkerB) {
                $walkerB = $walkerB->next;
                $lengthB++;
            }
        }

        return new Lengths($lengthA, $lengthB);
    }

    private function findIntersectionNodeForListsWithLengths($a, $b, $lengths) {
        while ($lengths->a > $lengths->b) {
            $a = $a->next;
            $lengths->a--;
        }
        while ($lengths->a < $lengths->b) {
            $b = $b->next;
            $lengths->b--;
        }
        while ($a || $b) {
            if ($a === $b) {
                return $b ?? $a;
            }
            $a = $a->next;
            $b = $b->next;
        }

        return null;
    }
}