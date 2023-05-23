<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $length = strlen($s);
        $max = $i = $j = 0;
        $seen = [];
        $substring = '';
        while ($i < $length && $j < $length) {
            while ($seen[$s[$j]]) {
                unset($seen[$s[$i]]);
                $i++;
            }
            $seen[$s[$j]] = true;
            $max = max($max, $j - $i + 1);
            $j++;
        }

        return $max;
    }
}