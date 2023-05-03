<?php

class Solution {

    /**
     * @param Integer[] $cost
     * @return Integer
     * @source https://youtu.be/hekG82t4U_M
     */
    function minCostClimbingStairs($cost) {
        $count = count($cost);
        $costToReach = [
            0 => $cost[0],
            1 => $cost[1],
        ];
        for ($i = 2; $i <= $count; $i++) {
            $costToReach[$i] = $cost[$i] + min($costToReach[$i-1], $costToReach[$i-2]);
        }
        return $costToReach[$count];
    }

    private function costToReachWithRecursion($cost, $i) {
        if ($i == 0 || $i == 1) {
            return $cost[$i];
        }
        return $cost[$i] + min($this->costClimbingTo($cost, $i - 1), $this->costClimbingTo($cost, $i - 2));
    }
}