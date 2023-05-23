<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        $length = count($nums);
        $bestSum = INF;
        for ($i = 0; $i < $length - 2; $i++) {
            for ($j = $i + 1; $j < $length - 1; $j++) {
                for ($k = $j + 1; $k < $length; $k++) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$k];
                    if (abs($sum - $target) < abs($bestSum - $target)) {
                        $bestSum = $sum;
                    }
                    if ($bestSum == $target) {
                        return $bestSum;
                    }
                }
            }
        }

        return $bestSum;
    }
}