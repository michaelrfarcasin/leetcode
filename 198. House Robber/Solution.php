<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * @source https://leetcode.com/problems/house-robber/solutions/156523/From-good-to-great.-How-to-approach-most-of-DP-problems
     */
    function rob($nums) {
        $length = count($nums);
        if ($length == 0) {
            return 0;
        }
        $memo = [0, $nums[0]];
        for ($i = 1; $i < $length; $i++) {
            $memo[$i + 1] = max($memo[$i], $memo[$i - 1] + $nums[$i]);
        }

        return $memo[$length];
    }
}