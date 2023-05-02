<?php

class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     * @source discussion
     */
    function numIslands($grid) {
        $numberIslands = 0;
        for ($row = 0; $row < count($grid); $row++) {
            for ($col = 0; $col < count($grid[$row]); $col++) {
                if ($grid[$row][$col] !== '1') {
                    continue;
                }
                $numberIslands++;
                $grid = $this->floodFillWithRecursion($grid, $row, $col, '0', '1');
            }
        }
        return $numberIslands;
    }

    private function floodFillWithRecursion($image, $row, $col, $newColor, $originalColor) {
        if ($image[$row][$col] !== $originalColor) {
            return $image;
        }
        $image[$row][$col] = $newColor;
        $image = $this->floodFillWithRecursion($image, $row-1, $col, $newColor, $originalColor);
        $image = $this->floodFillWithRecursion($image, $row+1, $col, $newColor, $originalColor);
        $image = $this->floodFillWithRecursion($image, $row, $col-1, $newColor, $originalColor);
        return $this->floodFillWithRecursion($image, $row, $col+1, $newColor, $originalColor);
    }
}