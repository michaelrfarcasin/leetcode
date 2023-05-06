<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($weights) {
        while (count($weights) > 1) {
            sort($weights);
            $first = array_pop($weights);
            $second = array_pop($weights);
            $weight = $first - $second;
            if ($weight != 0) {
                $weights[] = $weight;
            }
        }
        if (count($weights) < 1) {
            return 0;
        }
        if (count($weights) == 1) {
            return reset($weights);
        }
    }
}