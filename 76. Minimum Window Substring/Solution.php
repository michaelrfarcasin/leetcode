<?php

class Window {
    public $length = -1;
    public $left = 0;
    public $right = 0;
}

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        $sLength = strlen($s);
        $tLength = strlen($t);
        if ($tLength > $sLength || $tLength == 0 || $sLength == 0) {
            return '';
        }
        $frequencies = array_count_values(str_split($t));
        $numberRequired = count($frequencies);
        $numberFormed = 0;
        $windowCounts = [];
        $minWindow = new Window();
        $left = $right = 0;
        while ($right < $sLength) {
            $rightChar = $s[$right];
            $windowCounts[$rightChar]++;
            if (isset($frequencies[$rightChar]) && $windowCounts[$rightChar] === $frequencies[$rightChar]) {
                $numberFormed++;
            }
            while ($left <= $right && $numberFormed == $numberRequired) {
                $leftChar = $s[$left];
                if ($minWindow->length == -1 || $right - $left + 1 < $minWindow->length) {
                    $minWindow->length = $right - $left + 1;
                    $minWindow->left = $left;
                    $minWindow->right = $right;
                }

                $windowCounts[$leftChar]--;
                if (isset($frequencies[$leftChar]) && $windowCounts[$leftChar] < $frequencies[$leftChar]) {
                    $numberFormed--;
                }

                $left++;
            }

            $right++;
        }

        return $minWindow->length === -1 ? '' : substr($s, $minWindow->left, $minWindow->right + 1);
    }
}