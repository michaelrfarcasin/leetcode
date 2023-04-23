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
     * @param ?ListNode $head
     * @return Boolean
     * @source https://leetcode.com/problems/linked-list-cycle/solutions/1089229/php-solution-array-and-floyd-s-cycle-finding-algo/
     */
    function hasCycle($head) {
        if ($head === null) {
            return false;
        }
        $walker = $head;
        $runner = $head->next;
        while ($walker != $runner) {
            if ($runner === null || $runner->next === null) {
                return false;
            }
            $runner = $runner->next->next;
            $walker = $walker->next;
        }

        return true;
    }
}