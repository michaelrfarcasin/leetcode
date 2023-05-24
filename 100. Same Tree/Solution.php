<?php

class Pair {
    public $p;
    public $q;

    public function __construct($p, $q) {
        $this->p = $p;
        $this->q = $q;
    }

    public function haveEqualValues() {
        if ($this->p === null) {
            return $this->q === null;
        }
        if ($this->q === null) {
            return false;
        }

        return $this->p->val === $this->q->val;
    }
}

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        $queue = new SplQueue();
        $queue->enqueue(new Pair($p, $q));
        while (!$queue->isEmpty()) {
            $pair = $queue->dequeue();
            if (!$pair->haveEqualValues()) {
                return false;
            }
            if ($pair->p->left !== null) {
                if ($pair->q->left === null) {
                    return false;
                }
                $queue->enqueue(new Pair($pair->p->left, $pair->q->left));
            } elseif ($pair->q->left !== null) {
                return false;
            }
            if ($pair->p->right !== null) {
                if ($pair->q->right === null) {
                    return false;
                }
                $queue->enqueue(new Pair($pair->p->right, $pair->q->right));
            } elseif ($pair->q->right !== null) {
                return false;
            }
        }

        return true;
    }
}