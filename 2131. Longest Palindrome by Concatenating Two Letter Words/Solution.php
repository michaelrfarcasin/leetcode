<?php

class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function longestPalindrome($words) {
        $seen = [];
        $doubles = [];
        $max = 0;
        foreach ($words as $word) {
            if ($seen[$word] > 0) {
                $max += 4;
                $seen[$word]--;
                continue;
            }
            $reverse = strrev($word);
            $seen[$reverse]++;
            if ($reverse == $word) {
                $doubles[] = $word;
            }
        }
        foreach ($doubles as $word) {
            if ($seen[$word] > 0) {
                $max += 2;
                break;
            }
        }

        return $max;
    }
}