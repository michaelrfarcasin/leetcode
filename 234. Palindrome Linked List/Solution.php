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
     * @return Boolean
     */
    function isPalindrome($head) {
        $stack = [];
        $slow = $fast = $head;
        while (isset($fast->next)) {
            $stack[] = $slow->val;
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        if (isset($fast)) {
            $slow = $slow->next;
        }
        while (isset($slow)) {
            if ($slow->val !== array_pop($stack)) {
                return false;
            }
            $slow = $slow->next;
        }

        return true;
    }
}