<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $sIndex = 0;
        $sLength = strlen($s);
        $tLength = strlen($t);
        for ($tIndex = 0; $tIndex < $tLength && $sIndex < $sLength; $tIndex++) {
            if ($s[$sIndex] == $t[$tIndex]) {
                $sIndex++;
            }
        }

        return $sIndex >= $sLength;
    }
}
