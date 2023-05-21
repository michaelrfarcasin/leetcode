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
        $length = count($nums);
        $canMake = array_fill(0, $target + 1, false);
        $canMake[0] = true;
        for ($i = 1; $i <= $length; $i++) {
            $value = $nums[$i - 1];
            for ($sum = $target; $sum >= 0; $sum--) {
                if ($sum - $value < 0) {
                    break;
                }
                $canMake[$sum] = $canMake[$sum - $value] || $canMake[$sum];
                if ($canMake[$target]) {
                    return true;
                }
            }
        }

        return false;
    }
}