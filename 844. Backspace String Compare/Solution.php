<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        $i = strlen($s) - 1;
        $j = strlen($t) - 1;
        while ($i >= 0 && $j >= 0) {
            $i = $this->backspaceIndex($s, $i);
            $j = $this->backspaceIndex($t, $j);
            if ($i < 0 || $j < 0) {
                break;
            }
            if ($s[$i] != $t[$j]) {
                return false;
            }
            $i--;
            $j--;
        }
        if ($i >= 0) {
            $i = $this->backspaceIndex($s, $i);
        }
        if ($j >= 0) {
            $j = $this->backspaceIndex($t, $j);
        }
        if (($i <=> 0) != ($j <=> 0)) {
            return false;
        }
        return true;
    }

    private function backspaceIndex($s, $i) {
        if ($s[$i] != '#') {
            return $i;
        }
        $toSkip = 1;
        $i--;
        while (($s[$i] == '#' || $toSkip > 0) && $i >= 0) {
            if ($s[$i] == '#') {
                $toSkip++;
            } else {
                $toSkip--;
            }
            $i--;
        }

        return $i;
    }
}