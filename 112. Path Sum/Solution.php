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
     * @param Integer $targetSum
     * @return Integer
     */
    function hasPathSum($root, $targetSum) {
        if ($root === null) {
            return false;
        }
        return $this->hasPathSumNonempty($root, $targetSum);
    }

    private function hasPathSumNonempty($root, $targetSum) {
        if ($root->left === null && $root->right === null) {
            return $targetSum === $root->val;
        }
        $newTarget = $targetSum - $root->val;
        return $this->hasPathSumNonempty($root->left, $newTarget) || $this->hasPathSumNonempty($root->right, $newTarget);
    }
}