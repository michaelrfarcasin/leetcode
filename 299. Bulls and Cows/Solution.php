<?php

class Solution {

    /**
     * @param String $secret
     * @param String $guess
     * @return String
     */
    function getHint($secret, $guess) {
        $numberBulls = 0;
        $length = strlen($secret);
        $secretMap = array_fill_keys(str_split($secret), 0);
        $guessMap = array_fill_keys(str_split($guess), 0);
        for ($i = 0; $i < $length; $i++) {
            if ($secret[$i] == $guess[$i]) {
                $numberBulls++;
            } else {
                $secretMap[$secret[$i]]++;
                $guessMap[$guess[$i]]++;
            }
        }
        $numberCows = 0;
        foreach ($guessMap as $letter => $numberGuessed) {
            $numberCows += min($secretMap[$letter], $numberGuessed);
        }

        return $numberBulls . 'A' . $numberCows . 'B';
    }
}