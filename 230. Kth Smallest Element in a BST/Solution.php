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
     * @param Integer $k
     * @return Integer
     * @source Editorial
     */
    function kthSmallest($root, $k) {
        $stack = [];
        while(true) {
            while ($root !== null) {
                $stack[] = $root;
                $root = $root->left;
            }
            $root = array_pop($stack);
            if (--$k == 0) {
                return $root->val;
            }
            $root = $root->right;
        }
    }

    private function kthSmallestRecursive($root, $k) {
        $orderedElements = $this->getInorderRecursive($root, []);

        return $orderedElements[$k - 1];
    }

    private function getInorderRecursive($root, $elements) {
        if ($root === null) {
            return $elements;
        }
        $elements = $this->getInorder($root->left, $elements);
        $elements[] = $root->val;
        $elements = $this->getInorder($root->right, $elements);

        return $elements;
    }
}