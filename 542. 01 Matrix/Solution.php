<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[][]
     * @source Editorial
     */
    function updateMatrix($matrix) {
        $numberRows = count($matrix);
        $numberCols = count(reset($matrix));
        $distance = array_fill(0, $numberRows, array_fill(0, $numberCols, PHP_INT_MAX));
        for ($row = 0; $row < $numberRows; $row++) {
            for ($col = 0; $col < $numberCols; $col++) {
                if ($matrix[$row][$col] == 0) {
                    $distance[$row][$col] = 0;
                    continue;
                }
                if ($row > 0) {
                    $distance[$row][$col] = min($distance[$row][$col], $distance[$row - 1][$col] + 1);
                }
                if ($col > 0) {
                    $distance[$row][$col] = min($distance[$row][$col], $distance[$row][$col - 1] + 1);
                }
            }
        }
        for ($row = $numberRows - 1; $row >= 0; $row--) {
            for ($col = $numberCols - 1; $col >= 0; $col--) {
                if ($row < $numberRows - 1) {
                    $distance[$row][$col] = min($distance[$row][$col], $distance[$row + 1][$col] + 1);
                }
                if ($col < $numberCols - 1) {
                    $distance[$row][$col] = min($distance[$row][$col], $distance[$row][$col + 1] + 1);
                }
            }
        }

        return $distance;
    }
}