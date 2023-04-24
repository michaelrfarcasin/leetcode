<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $max = $min = reset($prices);
        $difference = 0;
        foreach ($prices as $price) {
            if ($price - $min > $difference) {
                $max = $price;
                $difference = $max - $min;
            }
            if ($price < $min) {
                $max = $min = $price;
            }
        }

        return $difference;
    }
}