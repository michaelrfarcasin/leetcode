<?php

class Solution {

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     * @source Editorial
     */
    function asteroidCollision($asteroids) {
        $stack = [];
        foreach ($asteroids as $asteroid) {
            $addAsteroid = true;
            while (!empty($stack) && $asteroid < 0 && 0 < end($stack)) {
                $asteroidSizeDifference = abs($asteroid) <=> abs(end($stack));
                if ($asteroidSizeDifference > 0) {
                    array_pop($stack);
                    continue;
                }
                if ($asteroidSizeDifference == 0) {
                    array_pop($stack);
                    $addAsteroid = false;
                    break;
                }
                $addAsteroid = false;
                break;
            }
            if ($addAsteroid) {
                array_push($stack, $asteroid);
            }
        }

        return $stack;
    }
}