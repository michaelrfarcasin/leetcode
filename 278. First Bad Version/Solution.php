<?php

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     * @source https://leetcode.com/problems/first-bad-version/solutions/1928828/php-simple-and-fast-solution-without-built-in-functions/
     */
    function firstBadVersion($n) {
        $min = 1;
        $max = $n;
        $index = -1;
        while ($min < $max) {
            $index = floor(($min + $max) / 2);
            if ($this->isBadVersion($index)) {
                $max = $index;
                continue;
            }
            $min = $index + 1;
        }

        return $max;
    }
}