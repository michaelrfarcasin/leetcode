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

    /** unused here, maybe useful */
    private function getMaxDistanceToRotten($grid, $rottenQueue) {
        $max = 0;
        while (!empty($rottenQueue)) {
            $rotten = array_shift($rottenQueue);
            $row = $rotten['row'];
            $col = $rotten['col'];
            $distance = $rotten['distance'];
            if ($distance > $max) {
                $max = $distance;
            }
            if (!$visited[$row-1][$col] && $grid[$row-1][$col] === 1) {
                $visited[$row-1][$col] = true;
                $rottenQueue[] = ['row' => $row-1, 'col' => $col, 'distance' => $distance + 1];
            }
            if (!$visited[$row+1][$col] && $grid[$row+1][$col] === 1) {
                $visited[$row+1][$col] = true;
                $rottenQueue[] = ['row' => $row+1, 'col' => $col, 'distance' => $distance + 1];
            }
            if (!$visited[$row][$col-1] && $grid[$row][$col-1] === 1) {
                $visited[$row][$col-1] = true;
                $rottenQueue[] = ['row' => $row, 'col' => $col-1, 'distance' => $distance + 1];
            }
            if (!$visited[$row][$col+1] && $grid[$row][$col+1] === 1) {
                $visited[$row][$col+1] = true;
                $rottenQueue[] = ['row' => $row, 'col' => $col+1, 'distance' => $distance + 1];
            }
        }

        return $max;
    }
}