<?php

class Solution {

    /**
     * @param String $s
     * @return String
     * @source https://leetcode.com/problems/decode-string/solutions/3016378/php-solution-iterative-stacks/
     */
    function decodeString($s) {
        $n = 0;
        $strings = [];
        $repeats = [''];
        $output = '';
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            $symbol = $s[$i];
            switch (true) {
                case is_numeric($symbol):
                    if (!isset($repeats[$n])) {
                        $repeats[$n] = '';
                    }
                    $repeats[$n] .= $symbol;
                    break;
                case $symbol === '[':
                    $strings[] = $output;
                    $output = '';
                    break;
                case $symbol === ']':
                    $repetitions = (int)array_pop($repeats);
                    $previous = array_pop($strings);
                    $temp = str_repeat($output, $repetitions);
                    $output = $previous . $temp;
                    break;
                default:
                    $output .= $symbol;
            }

            if (!is_numeric($symbol)) {
                $n++;
            }
        }

        return $output;
    }
}