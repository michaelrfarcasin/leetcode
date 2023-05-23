<?php

class Window {
    public $length = -1;
    public $start = 0;
}

class Pair {
    public $pos;
    public $char;

    public function __construct($pos, $char) {
        $this->pos = $pos;
        $this->char = $char;
    }
}

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     * @source Editorial
     */
    function minWindow($s, $t) {
        $sLength = strlen($s);
        $tLength = strlen($t);
        if ($tLength > $sLength || $tLength == 0 || $sLength == 0) {
            return '';
        }
        $frequencies = array_count_values(str_split($t));
        $filteredS = [];
        for ($i = 0; $i < $sLength; $i++) {
            $c = $s[$i];
            if (isset($frequencies[$c])) {
                $filteredS[] = new Pair($i, $c);
            }
        }
        $filteredSLength = count($filteredS);
        $numberRequired = count($frequencies);
        $numberFormed = 0;
        $windowCounts = [];
        $minWindow = new Window();
        $left = $right = 0;
        while ($right < $filteredSLength) {
            $rightChar = $filteredS[$right]->char;
            $windowCounts[$rightChar]++;
            if (isset($frequencies[$rightChar]) && $windowCounts[$rightChar] === $frequencies[$rightChar]) {
                $numberFormed++;
            }
            while ($left <= $right && $numberFormed == $numberRequired) {
                $leftChar = $filteredS[$left]->char;
                $start = $filteredS[$left]->pos;
                $end = $filteredS[$right]->pos;
                if ($minWindow->length == -1 || $end - $start + 1 < $minWindow->length) {
                    $minWindow->length = $end - $start + 1;
                    $minWindow->start = $start;
                }

                $windowCounts[$leftChar]--;
                if (isset($frequencies[$leftChar]) && $windowCounts[$leftChar] < $frequencies[$leftChar]) {
                    $numberFormed--;
                }

                $left++;
            }

            $right++;
        }

        return $minWindow->length === -1 ? '' : substr($s, $minWindow->start, $minWindow->length);
    }
}