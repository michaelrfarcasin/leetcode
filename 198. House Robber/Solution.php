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
        $prevPrev = 0;
        $prev = 0;
        foreach ($nums as $num) {
            $temp = $prev;
            $prev = max($prev, $prevPrev + $num);
            $prevPrev = $temp;
        }

        return $prev;
    }
}