<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     * @source Editorial
     */
    function characterReplacement($s, $k) {
        $length = strlen($s);
        $frequencies = array_fill_keys(str_split($s), 0);
        $maxFrequency = 0;
        $start = 0;
        $longestSubstringLength = 0;
        for ($end = 0; $end < $length; $end++) {
            $frequencies[$s[$end]]++;
            $maxFrequency = max($maxFrequency, $frequencies[$s[$end]]);
            $windowLength = $end + 1 - $start;
            $isValidWindow = $windowLength <= $maxFrequency + $k;
            if (!$isValidWindow) {
                $frequencies[$s[$start]]--;
                $start++;
            }
            $longestSubstringLength = $end + 1 - $start;
        }

        return $longestSubstringLength;
    }
}