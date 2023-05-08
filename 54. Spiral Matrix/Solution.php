<?php

class Solution {

    private const RIGHT = 0;
    private const DOWN = 1;
    private const LEFT = 2;
    private const UP = 3;

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        return $this->spiralOrderRecursive(
            $matrix,
            [],
            0,
            0,
            0,
            count($matrix)-1,
            0,
            count(reset($matrix))-1,
            self::RIGHT
        );
    }

    private function spiralOrderRecursive(
        $matrix,
        $output,
        $row,
        $col,
        $rowMin,
        $rowMax,
        $colMin,
        $colMax,
        $direction
    ) {
        if ($rowMin > $row || $row > $rowMax || $colMin > $col || $col > $colMax) {
            return $output;
        }
        $output[] = $matrix[$row][$col];
        switch ($direction) {
            case self::RIGHT:
                if ($col == $colMax) {
                    $row++;
                    $rowMin++;
                    $direction = self::DOWN;
                } else {
                    $col++;
                }
                break;
            case self::DOWN:
                if ($row == $rowMax) {
                    $col--;
                    $colMax--;
                    $direction = self::LEFT;
                } else {
                    $row++;
                }
                break;
            case self::LEFT:
                if ($col == $colMin) {
                    $row--;
                    $rowMax--;
                    $direction = self::UP;
                } else {
                    $col--;
                }
                break;
            case self::UP:
                if ($row == $rowMin) {
                    $col++;
                    $colMin++;
                    $direction = self::RIGHT;
                } else {
                    $row--;
                }
                break;
        }

        return $this->spiralOrderRecursive(
            $matrix,
            $output,
            $row,
            $col,
            $rowMin,
            $rowMax,
            $colMin,
            $colMax,
            $direction
        );
    }
}