<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class Solution {
    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        if ($p->val > $q->val) {
            $temp = $p;
            $p = $q;
            $q = $temp;
        }
        return $this->orderedLowestCommonAncestor($root, $p, $q);
    }

    private function orderedLowestCommonAncestor($node, $p, $q) {
        if ($p->val <= $node->val && $node->val <= $q->val) {
            return $node;
        }
        if ($q->val < $node->val) {
            return $this->orderedLowestCommonAncestor($node->left, $p, $q);
        }
        return $this->orderedLowestCommonAncestor($node->right, $p, $q);
    }
}