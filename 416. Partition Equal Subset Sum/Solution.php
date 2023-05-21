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
        $previousRow = array_fill(0, $target + 1, false);
        $currentRow = array_fill(0, $target + 1, false);
        $previousRow[0][0] = true;
        for ($i = 1; $i <= $length; $i++) {
            for ($sum = 0; $sum <= $target; $sum++) {
                if ($sum - $nums[$i - 1] >= 0) {
                    $currentRow[$sum] = $previousRow[$sum - $nums[$i - 1]] ||
                        $previousRow[$sum];
                } else {
                    $currentRow[$sum] = $previousRow[$sum];
                }
            }
            $previousRow = $currentRow;
        }

        return $currentRow[$target];
    }
}