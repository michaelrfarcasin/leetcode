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
     * @return ListNode
     * @source discussion section, especially gaoheyan's commment
     */
    function detectCycle($head) {
        if ($head === null) {
            return null;
        }
        $nodeInCycle = $this->findANodeInCycle($head);
        if ($nodeInCycle === null) {
            return null;
        }

        return $this->getIntersection($head, $nodeInCycle);
    }

    private function findANodeInCycle($head) {
        $walker = $head;
        $runner = $head->next;
        while ($walker !== $runner) {
            if ($runner === null || $runner->next === null) {
                return null;
            }
            $runner = $runner->next->next;
            $walker = $walker->next;
        }

        return $walker->next;
    }

    private function getIntersection($head, $nodeInCycle)
    {
        while ($head !== $nodeInCycle) {
            $head = $head->next;
            $nodeInCycle = $nodeInCycle->next;
        }

        return $head;
    }
}