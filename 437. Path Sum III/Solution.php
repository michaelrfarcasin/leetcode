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
     * @source https://leetcode.com/problems/path-sum-iii/solutions/3122546/php-100-memory/?envType=study-plan&id=level-2&orderBy=most_votes&languageTags=php
     */
    function pathSum($root, $targetSum) {
        if ($root === null) {
            return 0;
        }

        return $this->getPathsFrom($root, $targetSum) +
            $this->pathSum($root->left, $targetSum) +
            $this->pathSum($root->right, $targetSum);
    }

    private function getPathsFrom($root, $targetSum) {
        if ($root === null) {
            return 0;
        }
        $numberPaths = $root->val === $targetSum ? 1 : 0;
        $newTarget = $targetSum - $root->val;

        return $numberPaths +
            $this->getPathsFrom($root->left, $newTarget) +
            $this->getPathsFrom($root->right, $newTarget);
    }
}