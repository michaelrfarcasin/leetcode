<?php

class Solution {

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     * @source https://leetcode.com/problems/coin-change/solutions/778548/c-dp-solution-explained-100-time-100-space/
     */
    function coinChange($coins, $amount) {
        if ($amount == 0) {
            return 0;
        }
        $coinsUsed = array_fill(0, $amount + 1, INF);
        $coinsUsed[0] = 0;
        for ($toMake = 1; $toMake <= $amount; $toMake++) {
            foreach ($coins as $coin) {
                if ($toMake < $coin || $coinsUsed[$toMake - $coin] == INF) {
                    continue;
                }
                $coinsUsed[$toMake] = min($coinsUsed[$toMake - $coin] + 1, $coinsUsed[$toMake]);
            }
        }

        return $coinsUsed[$amount] == INF ? -1 : $coinsUsed[$amount];
    }
}