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
     * @return Integer[][]
     */
    function pathSum($root, $targetSum) {
        if ($root === null) {
            return [];
        }
         return $this->getRootToLeafSumPaths($root, $targetSum, []);
    }

    private function getRootToLeafSumPaths($root, $targetSum, $currentPath) {
        $currentPath[] = $root->val;
        if ($root->left === null && $root->right === null) {
            if ($targetSum === $root->val) {
                return [$currentPath];
            } else {
                return [];
            }
        }
        $newTarget = $targetSum - $root->val;

        return array_merge(
            $this->getRootToLeafSumPaths($root->left, $newTarget, $currentPath),
            $this->getRootToLeafSumPaths($root->right, $newTarget, $currentPath)
        );
    }
}