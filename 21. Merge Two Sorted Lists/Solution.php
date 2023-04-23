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
     * @source https://leetcode.com/problems/merge-two-sorted-lists/solutions/2383569/fastest-solution-explained-0ms-100-o-n-time-complexity-o-n-space-complexity/?envType=study-plan&id=level-1&languageTags=php
     */
    function mergeTwoLists($list1, $list2) {
        if($list1 == null) return $list2;
        if($list2 == null) return $list1;
        if($list1->val < $list2->val) {
            $list1->next = $this->mergeTwoLists($list1->next, $list2);
            return $list1;
        } else {
            $list2->next = $this->mergeTwoLists($list2->next, $list1);
            return $list2;
        }
    }
}