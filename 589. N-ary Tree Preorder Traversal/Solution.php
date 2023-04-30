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
        return $this->preorderWithIteration($root);
    }

    /**
     * @source https://leetcode.com/problems/n-ary-tree-preorder-traversal/solutions/872903/php-recursive-n-ary-tree-preorder-traversal/
     */
    private function preorderWithRecursion($node, $result = []) {
        if (!isset($node)) {
            return $result;
        }
        $result[] = $node->val;
        foreach ($node->children as $child) {
            $result = $this->preorderWithRecursion($child, $result);
        }

        return $result;
    }

    /**
     * @source https://leetcode.com/problems/n-ary-tree-preorder-traversal/solutions/872903/php-recursive-n-ary-tree-preorder-traversal/
     */
    private function preorderWithIteration($root) {
        if (!isset($root)) {
            return [];
        }
        $stack = [$root];
        while ($node = array_shift($stack)) {
            $result[] = $node->val;
            array_unshift($stack, ...$node->children);
        }

        return $result;
    }

    /**
     * Usage:
     * $orderedNodes = $this->preorderWithTailRecursion($root, [], [$root]);
     * return array_reduce($orderedNodes, [$this, 'getValues'], []);
     */
    private function preorderWithTailRecursion($node, $visited = [], $toVisit = []) {
        if (empty($toVisit) || !isset($node)) {
            return $visited;
        }
        $visited[spl_object_id($node)] = $node;
        $unvisitedChildren = $this->getUnvisited($node->children, $visited);
        if (!empty($unvisitedChildren)) {
            $toVisit = array_merge($unvisitedChildren, [$node], $toVisit);
        }
        $nextNode = array_shift($toVisit);

        return $this->preorderWithTailRecursion($nextNode, $visited, $toVisit);
    }

    private function getUnvisited($nodes, $visited) {
        $unvisited = [];
        foreach ($nodes as $node) {
            if (!in_array($node, $visited, true)) {
                $unvisited[] = $node;
            }
        }

        return $unvisited;
    }

    public function getValues($partialValues, $node) {
        $partialValues[] = $node->val;

        return $partialValues;
    }
}