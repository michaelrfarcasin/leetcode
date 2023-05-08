<?php

class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     * @source https://leetcode.com/problems/multiply-strings/solutions/2189320/two-php-solutions-runtime-85-ms-memory-usage-19-2-mb/?envType=study-plan&id=level-2&orderBy=most_votes&languageTags=php
     */
    function multiply($num1, $num2) {
        if ($num1 === '0' || $num2 === '0') {
            return '0';
        }
        $length1 = strlen($num1);
        $length2 = strlen($num2);
        $products = array_fill(0, $length1 + $length2, 0);
        for ($i = $length1 - 1; $i >= 0; $i--) {
            for ($j = $length2 - 1; $j >= 0; $j--) {
                $product = $num1[$i] * $num2[$j];
                $productPlusRemainder = $products[$i + $j + 1] + $product;
                $products[$i + $j + 1] = $productPlusRemainder % 10;
                $products[$i + $j] += intdiv($productPlusRemainder, 10);
            }
        }
        while ($products[0] === 0) {
            array_shift($products);
        }

        return implode('', $products);
    }
}