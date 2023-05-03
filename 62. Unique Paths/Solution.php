<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $steps = ($m-1) + ($n-1);
        return $this->combinations($steps, $m-1);
    }

    private function combinations($n, $r) {
        return $this->factorial($n, $r) / $this->factorial($n - $r);
    }

    private function factorial($n, $base = 1) {
        $result = 1;
        for ($i = $base + 1; $i <= $n; $i++) {
            $result *= $i;
        }

        return $result;
    }
}