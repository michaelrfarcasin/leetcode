<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     * @source https://www.geeksforgeeks.org/tail-recursion-fibonacci/
     */
    function fib($n, $a = 0, $b = 1) {
        if ($n == 0) {
            return $a;
        }
        if ($n == 1) {
            return $b;
        }
        return $this->fib($n - 1, $b, $a + $b);
    }
}