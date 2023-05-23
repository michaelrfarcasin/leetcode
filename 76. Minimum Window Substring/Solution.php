<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        $m = strlen($s);
        $n = strlen($t);
        if ($n > $m) {
            return '';
        }
        $frequencies = array_count_values(str_split($t));
        $left = 0; $right = $m - 1;
        do  {
            $leftChar = $s[$left];
            if ($frequencies[$leftChar] > 0) {
                $left++;
                $frequencies[$leftChar]--;
            }
            $rightChar = $s[$right];
            if ($frequencies[$rightChar] > 0) {
                $right--;
                $frequencies[$rightChar]--;
            }
        } while (($right - $left + 1 > $n) && (
            $frequencies[$leftChar] != 0 || $frequencies[$rightChar] != 0
        ));

        return substr($s, $left, $right - $left + 1);
    }
}