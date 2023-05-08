<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function findBall($grid) {
        $numberRows = count($grid);
        $numberColumns = count(reset($grid));
        $positions = $this->getBallStartingPositions($numberColumns);
        for ($row = 0; $row < $numberRows; $row++) {
            $positions = $this->moveBallsToNextRow($positions, $grid[$row]);
        }

        return $positions;
    }

    private function getBallStartingPositions($numberColumns) {
        $positions = [];
        for ($i = 0; $i < $numberColumns; $i++) {
            $positions[$i] = $i;
        }

        return $positions;
    }

    private function moveBallsToNextRow($positions, $row) {
        $numberColumns = count($row);
        foreach ($positions as $ball => $position) {
            if ($position == -1) {
                continue;
            }
            $direction = $row[$position];
            $nextPosition = $position + $direction;
            $ballGetsStuck = $row[$nextPosition] * $direction < 0;
            if ($nextPosition < 0 || $nextPosition >= $numberColumns || $ballGetsStuck) {
                $positions[$ball] = -1;
            } else {
                $positions[$ball] = $nextPosition;
            }
        }

        return $positions;
    }
}