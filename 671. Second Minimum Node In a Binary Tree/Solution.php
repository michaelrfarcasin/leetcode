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
     * @return Integer
     * @source https://leetcode.com/problems/second-minimum-node-in-a-binary-tree/solutions/107233/java-4-lines/
     */
    function findSecondMinimumValue($root) {
        if ($root->left === null) {
            return -1;
        }
        $leftValue = $root->left->val;
        if ($leftValue === $root->val) {
            $leftValue = $this->findSecondMinimumValue($root->left);
        }
        $rightValue = $root->right->val;
        if ($rightValue === $root->val) {
            $rightValue = $this->findSecondMinimumValue($root->right);
        }

        return ($leftValue == -1 || $rightValue == -1) ? max($leftValue, $rightValue) : min($leftValue, $rightValue);
    }
}