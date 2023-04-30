<?php

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
     * @param TreeNode $root
     * @return Boolean
     * @source editorial
     */
    function isValidBST($root) {
        return $this->validate($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    private function validate($node, $lowerLimit, $upperLimit) {
        if (!isset($node)) {
            return true;
        }
        if (!($lowerLimit < $node->val && $node->val < $upperLimit)) {
            return false;
        }

        return $this->validate($node->left, $lowerLimit, $node->val) &&
            $this->validate($node->right, $node->val, $upperLimit);
    }
}