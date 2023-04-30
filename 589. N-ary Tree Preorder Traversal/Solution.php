<?php

/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    function preorder($root) {
        return $this->preorderWithRecursion($root, []);
    }

    /**
     * @source https://leetcode.com/problems/n-ary-tree-preorder-traversal/solutions/872903/php-recursive-n-ary-tree-preorder-traversal/
     */
    private function preorderWithRecursion($node, $result) {
        if (!isset($node)) {
            return $result;
        }
        $result[] = $node->val;
        foreach ($node->children as $child) {
            $result = $this->preorderWithRecursion($child, $result);
        }

        return $result;
    }
}