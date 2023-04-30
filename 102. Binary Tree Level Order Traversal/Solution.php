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
     * @return Integer[][]
     */
    function levelOrder($root) {
        if (empty($root)) {
            return [];
        }

        return $this->levelOrderWithRecursion($root, 0);
    }

    private function levelOrderWithRecursion($node, $height, $output = []) {
        if (!isset($node)) {
            return $output;
        }
        $output[$height][] = $node->val;
        $output = $this->levelOrderWithRecursion($node->left, $height+1, $output);
        $output = $this->levelOrderWithRecursion($node->right, $height+1, $output);

        return $output;
    }
}