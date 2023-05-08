<?php

class Solution {

    /**
     * @param String[] $strings
     * @return String
     */
    function longestCommonPrefix($strings) {
        $prefix = reset($strings);
        foreach ($strings as $string) {
            while (!str_starts_with($string, $prefix)) {
                $prefix = substr($prefix, 0, -1);
            }
            if (strlen($prefix) == 0) {
                break;
            }
        }

        return $prefix;
    }
}