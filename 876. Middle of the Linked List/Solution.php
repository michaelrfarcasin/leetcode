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
     * @source https://leetcode.com/problems/middle-of-the-linked-list/solutions/2731381/best-php-solution/
     */
    function middleNode($head) {
        $slow = $head;

        while ($head->next !== null) {
            $slow = $slow->next;
            $head = $head->next->next;
        }

        return $slow;
    }
}