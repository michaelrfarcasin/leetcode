<?php

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n, $seen = []) {
        if (isset($seen[$n])) {
            return false;
        } elseif ($n == 1) {
            return true;
        }
        if (count($seen) == 9) {
            array_shift($seen);
        }
        $seen[$n] = true;
        $next = 0;
        while ($n > 0) {
            $next += pow($n % 10, 2);
            $n /= 10;
        }
        return $this->isHappy($next, $seen);
    }
}