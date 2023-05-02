<?php

class Solution {

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        $originalColor = $image[$sr][$sc];
        if ($originalColor == $color) {
            return $image;
        }
        return $this->floodFillWithRecursion($image, $sr, $sc, $color, $originalColor);
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