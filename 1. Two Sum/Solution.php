<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $length = count($nums);
        $seen = [];
        for ($i = 0; $i < $length; $i++) {
            if (isset($seen[$nums[$i]])) {
                return [$seen[$nums[$i]], $i];
            } else {
                $seen[$target - $nums[$i]] = $i;
            }
        }

        return [0, 1];
    }
}