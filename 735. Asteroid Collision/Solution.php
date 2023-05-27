<?php

class Solution {

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids) {
        $escapedLeft = [];
        $escapedRight = [];
        $length = count($asteroids);
        $limit = 100;
        var_dump(empty($asteroids) ? 't' : 'f');
        while (!empty($asteroids) && $limit > 0) {
            var_dump("$limit: " . implode(',',$asteroids));
            while (reset($asteroids) < 0) {
                $limit--;
                var_dump("$limit: " . implode(',',$asteroids));
                $escapedLeft[] = array_shift($asteroids);
            }
            while (end($asteroids) > 0) {
                $limit--;
                var_dump("$limit: " . implode(',',$asteroids));
                array_unshift($escapedRight, array_pop($asteroids));
            }
            $length = count($asteroids);
            for ($i = 0; $i < $length; $i++) {
                $limit--;
                var_dump("$limit: $i : " . implode(',',$asteroids));
                if ($asteroids[$i] == 0) {
                    unset($asteroids[$i]);
                    continue;
                }
                if ($i == $length - 1 && $asteroids[$i] > 0) {
                    break;
                }
                if ($asteroids[$i] > 0) {
                    $asteroids[$i + 1] = max($asteroids[$i], $asteroids[$i + 1]);
                    $asteroids[$i] = 0;
                } else {
                    $asteroids[$i - 1] = max($asteroids[$i], $asteroids[$i - 1]);
                    $asteroids[$i] = 0;
                }
            }
        }

        return array_merge($escapedLeft, $escapedRight);
    }
}