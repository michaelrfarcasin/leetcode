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
    function oddEvenList($head) {
        if (!isset($head) || !isset($head->next) || !isset($head->next->next)) {
            return $head;
        }
        $odd = $head;
        $evenHead = $even = $head->next;
        while (isset($odd->next) && isset($even->next)) {
            $odd->next = $odd->next->next;
            $odd = $odd->next;
            $even->next = $even->next->next;
            $even = $even->next;
        }
        $odd->next = $evenHead;

        return $head;
    }
}