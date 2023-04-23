<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($a, $b) {
        if ($this->areInputsNull($a, $b)) {
            return !$a ? $b : $a;
        }
        if ($this->isNodeLessThan($b, $a)) {
            $temp = $a;
            $a = $b;
            $b = $temp;
        }
        return $this->mergeTwoNonNullListsWithSmallerFirst($a, $b);
    }

    private function areInputsNull($a, $b) {
        return $a === null || $b === null;
    }

    private function isNodeLessThan($a, $b) {
        return $a->val < $b->val;
    }

    private function mergeTwoNonNullListsWithSmallerFirst($a, $b) {
        $previousNode = $a;
        while ($previousNode->next != null && $b != null) {
            $currentNode = $previousNode->next;
            if ($this->isNodeLessThan($b, $currentNode)) {
                $previousNode->next = $b;
                $b = $b->next;
                $previousNode->next->next = $currentNode;
            }
            $previousNode = $previousNode->next;
        }
        if ($b != null) {
            $previousNode->next = $b;
        }

        return $a;
    }
}