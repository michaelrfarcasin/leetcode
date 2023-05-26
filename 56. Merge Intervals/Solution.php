<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        usort($intervals, [$this, 'compareIntervals']);
        $newIntervals = [];
        $intervalToAdd = null;
        $length = count($intervals);
        for ($i = 0; $i < $length; $i++) {
            $interval = $intervals[$i];
            if ($i == $length - 1) {
                $newIntervals[] = $interval;
                break;
            }
            $nextInterval = $intervals[$i + 1];
            while ($this->overlapsNextIntervalStart($interval, $nextInterval)) {
                $intervalToAdd = [
                    min($interval[0], $nextInterval[0]),
                    max($interval[1], $nextInterval[1])
                ];
                $i++;
                if ($i >= $length - 1) {
                    break;
                }
                $interval = $intervalToAdd;
                $nextInterval = $intervals[$i + 1];
            }
            if ($intervalToAdd !== null) {
                $newIntervals[] = $intervalToAdd;
                $intervalToAdd = null;
            } else {
                $newIntervals[] = $interval;
            }
        }

        return $newIntervals;
    }

    protected function compareIntervals($a, $b) {
        return $a[0] <=> $b[0];
    }

    private function overlapsNextIntervalStart($current, $next) {
        return $next[0] <= $current[1];
    }
}