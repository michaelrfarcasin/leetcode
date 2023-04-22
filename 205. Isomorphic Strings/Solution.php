<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        $replacements = [];
        $numberOfLetters = strlen($s);
        for ($i = 0; $i < $numberOfLetters; $i++) {
            $sLetter = $s[$i];
            $tLetter = $t[$i];
            if (!$replacements[$sLetter] && array_search($tLetter, $replacements) === false) {
                $replacements[$sLetter] = $tLetter;
            }
            if ($replacements[$sLetter] != $tLetter) {
                return false;
            }
        }

        return true;
    }
}
