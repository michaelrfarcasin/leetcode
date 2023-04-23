<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        $shorterLength = 0;
        $walkerA = $headA;
        $walkerB = $headB;
        while ($walkerA->next !== null && $walkerB->next !== null) {
            $shorterLength++;
            $walkerA = $walkerA->next;
            $walkerB = $walkerB->next;
        }
        if ($walkerA->next !== null) {
            $longerLength = $this->getRemainingLength($walkerA, $shorterLength);
            return $this->findIntersectionNodeForSorted($headA, $headB, $longerLength - $shorterLength);
        }
        $longerLength = $this->getRemainingLength($walkerB, $shorterLength);
        return $this->findIntersectionNodeForSorted($headB, $headA, $longerLength - $shorterLength);
    }

    private function getRemainingLength($head, $length) {
        while ($head->next !== null) {
            $length++;
            $head = $head->next;
        }

        return $length;
    }

    private function findIntersectionNodeForSorted($longerList, $shorterList, $lengthDifference) {
        for ($i = 0; $i < $lengthDifference; $i++) {
            $longerList = $longerList->next;
        }
        while ($shorterList !== null) {
            if ($shorterList === $longerList) {
                return $shorterList;
            }
            $shorterList = $shorterList->next;
            $longerList = $longerList->next;
        }

        return null;
    }
}