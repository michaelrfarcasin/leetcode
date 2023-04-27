<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $unmatched = [];
        $length = 0;
        $letters = str_split($s);
        foreach($letters as $letter) {
            if ($unmatched[$letter]) {
                unset($unmatched[$letter]);
                $length+=2;
                continue;
            }
            $unmatched[$letter] = true;
        }
        if (count($unmatched) > 0) {
            $length += 1;
        }

        return $length;
    }
}