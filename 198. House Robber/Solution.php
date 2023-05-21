<?php

class Solution {
    private $memo = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     * @source https://leetcode.com/problems/house-robber/solutions/156523/From-good-to-great.-How-to-approach-most-of-DP-problems
     */
    function rob($nums) {
        return $this->robPosition($nums, count($nums) - 1);
    }

    private function robPosition($nums, $i) {
        if ($i < 0) {
            return 0;
        }
        if (isset($this->memo[$i])) {
            return $this->memo[$i];
        }

        $this->memo[$i] = max($this->robPosition($nums, $i - 2) + $nums[$i], $this->robPosition($nums, $i - 1));
        return $this->memo[$i];
    }
}