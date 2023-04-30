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

        return $this->levelOrderWithIteration($root);
    }

    private function levelOrderWithRecursion($node, $height = 0, $output = []) {
        if (!isset($node)) {
            return $output;
        }
        $output[$height][] = $node->val;
        $output = $this->levelOrderWithRecursion($node->left, $height+1, $output);
        $output = $this->levelOrderWithRecursion($node->right, $height+1, $output);

        return $output;
    }

    /**
     * @source https://leetcode.com/problems/binary-tree-level-order-traversal/solutions/2910673/php-solution-iteration-bfs-beats-92-96/?envType=study-plan&id=level-1&languageTags=php
     */
    private function levelOrderWithIteration($root) {
        $values = [];
        $queue = [$root];
        while (!empty($queue)) {
            $level = [];
            $size = count($queue);
            for ($i = 0; $i < $size; $i++) {
                $current = array_shift($queue);
                $level[] = $current->val;
                if ($current->left) {
                    $queue[] = $current->left;
                }
                if ($current->right) {
                    $queue[] = $current->right;
                }
            }
            $values[] = $level;
        }

        return $values;
    }
}