<?php

class Solution {

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) {
        if (empty($intervals)) {
            return [$newInterval];
        }
        if ($newInterval[1] < $intervals[0][0]) {
            return array_merge([$newInterval], $intervals);
        }
        if (end($intervals)[1] < $newInterval[0]) {
            $intervals[] = $newInterval;
            return $intervals;
        }
        $targetStart = $newInterval[0];
        $index = $this->findGreatestIntervalStartingBelow($intervals, $targetStart);
        $newIntervals = [];
        $intervalToAdd = $this->createIntervalToAdd($intervals[$index], $newInterval);
        $isOverlapping = false;
        foreach ($intervals as $i => $interval) {
            if ($i < $index) {
                $newIntervals[] = $interval;
                continue;
            }
            if ($i == $index) {
                if ($interval[1] < $intervalToAdd[0]) {
                    $newIntervals[] = $interval;
                }
                $isOverlapping = true;
                continue;
            }
            if ($this->newOverlapsInterval($intervalToAdd, $interval)) {
                continue;
            }
            if ($this->newOverlapsIntervalStart($intervalToAdd, $interval)) {
                $intervalToAdd[1] = max($interval[1], $intervalToAdd[1]);
                continue;
            }
            if ($isOverlapping) {
                $isOverlapping = false;
                $newIntervals[] = $intervalToAdd;
                if ($intervalToAdd[1] < $intervals[$index][0]) {
                    $newIntervals[] = $intervals[$index];
                }
            }
            $newIntervals[] = $interval;
        }
        if ($isOverlapping) {
            $newIntervals[] = $intervalToAdd;
            if ($intervalToAdd[1] < $interval[0]) {
                $newIntervals[] = $interval;
            }
        }

        return $newIntervals;
    }

    private function findGreatestIntervalStartingBelow($intervals, $target) {
        $low = 0;
        $high = count($intervals);
        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            $thisStart = $intervals[$mid][0];
            $nextStart = $intervals[$mid + 1][0] ?? INF;
            if ($thisStart <= $target && $nextStart > $target) {
                return $mid;
            }
            if ($thisStart <= $target) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return $low;
    }

    private function createIntervalToAdd($indexInterval, $newInterval) {
        if ($indexInterval[1] < $newInterval[0] || $newInterval[1] < $indexInterval[0]) {
            return $newInterval;
        }

        return [
            min($indexInterval[0], $newInterval[0]),
            max($indexInterval[1], $newInterval[1])
        ];
    }

    private function newOverlapsInterval($new, $interval) {
        $start = $interval[0];
        $end = $interval[1];

        return $new[0] <= $start && $end < $new[1];
    }

    private function newOverlapsIntervalStart($new, $interval) {
        $start = $interval[0];

        return $new[0] <= $start && $start <= $new[1];
    }
}