<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        $length = count($nums);
        sort($nums);
        $bestSum = INF;
        for ($i = 0; $i < $length; $i++) {
            $j = $i + 1;
            $k = $length - 1;
            while ($j < $k) {
                $sum = $nums[$i] + $nums[$j] + $nums[$k];
                if (abs($sum - $target) < abs($bestSum - $target)) {
                    $bestSum = $sum;
                }
                if ($sum == $target) {
                    return $sum;
                }
                if ($sum < $target) {
                    $j++;
                } else {
                    $k--;
                }
            }
        }

        return $bestSum;
    }
}