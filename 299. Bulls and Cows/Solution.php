<?php

class Solution {

    /**
     * @param String $secret
     * @param String $guess
     * @return String
     * @source https://leetcode.com/problems/bulls-and-cows/solutions/74621/one-pass-java-solution/?orderBy=most_votes
     */
    function getHint($secret, $guess) {
        $numberBulls = 0;
        $numberCows = 0;
        $seen = array_fill_keys([0,1,2,3,4,5,6,7,8,9], 0);
        $length = strlen($secret);
        for ($i = 0; $i < $length; $i++) {
            if ($secret[$i] == $guess[$i]) {
                $numberBulls++;
            } else {
                if ($seen[$secret[$i]] < 0) {
                    $numberCows++;
                }
                $seen[$secret[$i]]++;
                if ($seen[$guess[$i]] > 0) {
                    $numberCows++;
                }
                $seen[$guess[$i]]--;
            }
        }

        return $numberBulls . 'A' . $numberCows . 'B';
    }
}