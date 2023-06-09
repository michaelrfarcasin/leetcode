<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $min = 0;
        $max = count($nums);
        while ($min < $max) {
            $index = floor(($min + $max) / 2);
            if ($nums[$index] == $target) {
                return $index;
            }
            if ($nums[$index] < $target) {
                $min = $index + 1;
                continue;
            }
            $max = $index - 1;
        }
        $index = floor(($min + $max) / 2);

        return $nums[$index] == $target ? $index : -1;
    }
}