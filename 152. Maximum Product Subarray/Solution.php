<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     * @source https://nwthomas.medium.com/maximum-product-subarray-leetcode-code-challenge-a2d4854f9bf2
     */
    function maxProduct($nums) {
        $max = $nums[0];
        $currentMax = 1;
        $currentMin = 1;
        foreach ($nums as $num) {
            $product = $currentMax * $num;
            $inverse = $currentMin * $num;
            $currentMax = max($num, $product, $inverse);
            $currentMin = min($num, $product, $inverse);
            $max = max($num, $max, $currentMax);
        }

        return $max;
    }
}