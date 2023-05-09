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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $tail = $slow = $fast = $head;
        for ($i = 0; $i < $n && isset($fast); $i++) {
            $fast = $fast->next;
        }
        if (isset($fast)) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        while (isset($fast)) {
            $fast = $fast->next;
            $slow = $slow->next;
            $tail = $tail->next;
        }
        if ($slow === $head) {
            $head = $head->next;
        } else {
            $tail->next = $tail->next->next;
        }

        return $head;
    }
}