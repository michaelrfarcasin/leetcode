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
class MetaData {
    public $height = 0;
    public $diameter = 0;
}
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        return $this->calculateMetaData($root)->diameter;
    }

    private function calculateMetaData($node) {
        $metaData = new MetaData();
        if ($node === null) {
            return $metaData;
        }

        $leftData = $this->calculateMetaData($node->left);
        $rightData = $this->calculateMetaData($node->right);
        $metaData->height = max($leftData->height, $rightData->height) + 1;
        $distanceThroughSelf = $leftData->height + $rightData->height;
        $metaData->diameter = max([$distanceThroughSelf, $leftData->diameter, $rightData->diameter]);

        return $metaData;
    }
}