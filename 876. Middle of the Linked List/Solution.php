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
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head) {
        $listLength = $this->getListLength($head);
        $halfLength = floor($listLength / 2);
        for ($i = 0; $i < $halfLength; $i++) {
            $head = $head->next;
        }

        return $head;
    }

    private function getListLength($head) {
        return $this->getLengthWithTailRecursion($head, 0);
    }

    private function getLengthWithTailRecursion($head, $runningLength) {
        if ($head->next == null) {
            return $runningLength + 1;
        }

        return $this->getLengthWithTailRecursion($head->next, $runningLength + 1);
    }
}