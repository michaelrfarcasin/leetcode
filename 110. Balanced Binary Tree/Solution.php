<?php

class MetaData {
    public $height = 0;
    public $isBalanced = true;
}

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
     */
    function isBalanced($root) {
        return $this->getMetaData($root)->isBalanced;
    }

    private function getMetaData($root) {
        $metaData = new MetaData();
        if ($root == null) {
            return $metaData;
        }
        $leftMetaData = $this->getMetaData($root->left);
        $rightMetaData = $this->getMetaData($root->right);
        $metaData->height = max($leftMetaData->height, $rightMetaData->height) + 1;
        $heightsBalanced = abs($leftMetaData->height - $rightMetaData->height) <= 1;
        $metaData->isBalanced = $leftMetaData->isBalanced && $rightMetaData->isBalanced && $heightsBalanced;

        return $metaData;
    }
}