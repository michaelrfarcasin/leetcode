<?php

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $min = 1;
        $max = $n;
        $lastBadIndex = -1;
        while ($min < $max) {
            $index = floor(($min + $max) / 2);
            $isBad = $this->isBadVersion($index);
            if ($isBad) {
                $lastBadIndex = $index;
                $max = $index - 1;
                continue;
            }
            $min = $index + 1;
        }
        $index = floor(($min + $max) / 2);
        if ($this->isBadVersion($index)) {
            return $index;
        }

        return $lastBadIndex;
    }
}