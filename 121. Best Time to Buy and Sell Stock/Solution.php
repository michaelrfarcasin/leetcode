<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = reset($prices);
        $difference = 0;
        foreach ($prices as $price) {
            if ($price - $min > $difference) {
                $difference = $price - $min;
            }
            if ($price < $min) {
                $min = $price;
            }
        }

        return $difference;
    }
}