<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     * @source https://www.geeksforgeeks.org/tail-recursion-fibonacci/
     */
    function climbStairs($n, $a = 1, $b = 1) {
        if ($n == 0) {
            return $a;
        }
        if ($n == 1) {
            return $b;
        }
        return $this->climbStairs($n - 1, $b, $a + $b);
    }
}