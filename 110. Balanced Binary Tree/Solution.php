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
     * @source https://leetcode.com/problems/balanced-binary-tree/solutions/329903/php/?envType=study-plan&id=level-2&orderBy=most_votes&languageTags=php
     */
    function isBalanced($root) {
        return $this->calculateDepth($root) != -1;
    }

    function calculateDepth($node) {
        if ($node === null) {
            return 0;
        }

        $leftDepth = $this->calculateDepth($node->left);
        if ($leftDepth == -1) {
            return -1;
        }

        $rightDepth = $this->calculateDepth($node->right);
        if ($rightDepth == -1) {
            return -1;
        }

        if (abs($leftDepth - $rightDepth) > 1) {
            return -1;
        }

        return Max($leftDepth, $rightDepth) + 1;
    }

}