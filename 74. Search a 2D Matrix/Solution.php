 <?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $targetRow = $this->getTargetRow($matrix, $target);
        if ($targetRow < 0) {
            return false;
        }
        return $this->isInRow($matrix[$targetRow], $target);
    }

    private function getTargetRow($matrix, $target) {
        $low = 0;
        $high = count($matrix) - 1;
        if ($low == $high) {
            return $low;
        }
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($matrix[$mid][0] <= $target && (
                $matrix[$mid + 1] === null || $target < $matrix[$mid + 1][0]
                )) {
                return $mid;
            }
            if ($matrix[$mid + 1][0] <= $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return -1;
    }

    private function isInRow($row, $target) {
        $low = 0;
        $high = count($row) - 1;
        while ($low <= $high) {
            $mid = intdiv($low + $high, 2);
            if ($row[$mid] === $target) {
                return true;
            }
            if ($row[$mid] < $target) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return false;
    }
}