<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $result = [];
        foreach ($nums as $i => $num) {
            $result[$i] = $num + $result[$i - 1] ?? 0;
        }

        return $result;
    }
}
