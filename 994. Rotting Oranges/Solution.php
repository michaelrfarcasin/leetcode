<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     * @source https://leetcode.com/problems/rotting-oranges/solutions/563686/python-clean-well-explained-faster-than-90/
     */
    function orangesRotting($grid) {
        $freshCount = 0;
        $rotten = [];
        foreach ($grid as $row => $columns) {
            foreach ($columns as $col => $state) {
                if ($state == 2) {
                    $rotten[] = [$row, $col];
                } elseif ($state == 1) {
                    $freshCount++;
                }
            }
        }
        $minutes = 0;
        while (!empty($rotten) && $freshCount > 0) {
            $minutes++;
            foreach ($rotten as $key => $pair) {
                unset ($rotten[$key]);
                $row = $pair[0];
                $col = $pair[1];
                foreach ([[-1, 0], [1, 0], [0, -1], [0, 1]] as $adjacent) {
                    $adjacentRow = $row + $adjacent[0];
                    $adjacentCol = $col + $adjacent[1];
                    if (!isset($grid[$adjacentRow][$adjacentCol]) ||
                        $grid[$adjacentRow][$adjacentCol] == 0 ||
                        $grid[$adjacentRow][$adjacentCol] == 2) {
                        continue;
                    }
                    $freshCount--;
                    $grid[$adjacentRow][$adjacentCol] = 2;
                    $rotten[] = [$adjacentRow, $adjacentCol];
                }
            }
        }

        return $freshCount == 0 ? $minutes : -1;
    }
}