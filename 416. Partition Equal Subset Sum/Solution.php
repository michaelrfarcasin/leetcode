<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     * @source https://leetcode.com/problems/partition-equal-subset-sum/solutions/462699/whiteboard-editorial-all-approaches-explained/
     */
    function canPartition($nums) {
        $target = array_sum($nums) / 2;
        if (!is_int($target)) {
            return false;
        }
        rsort($nums);
        $length = count($nums);

        function backtracking($remaining, $i, $nums, $length) {
            if ($remaining < $nums[$i] || $i >= $length) return false;
            if ($remaining === $nums[$i]) return true;

            return backtracking($remaining - $nums[$i], $i + 1, $nums, $length) ||
                backtracking($remaining, $i + 1, $nums, $length);
        }

        return backtracking($target, 0, $nums, $length);
    }
}