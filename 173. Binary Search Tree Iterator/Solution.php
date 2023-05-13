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
class BSTIterator {
    private $values;
    private $pointer = -1;

    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        $this->values = $this->getInorder($root, []);
    }

    /**
     * @return Integer
     */
    function next() {
        return $this->values[++$this->pointer];
    }

    /**
     * @return Boolean
     */
    function hasNext() {
        return isset($this->values[$this->pointer + 1]);
    }

    private function getInorder($root, $values) {
        if ($root === null) {
            return $values;
        }
        $values = $this->getInorder($root->left, $values);
        $values[] = $root->val;
        $values = $this->getInorder($root->right, $values);

        return $values;
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */