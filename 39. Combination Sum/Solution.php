<?php

class Solution {
    private $sums = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     * @source discussion
     */
    function combinationSum($candidates, $target) {
        sort($candidates);
        $this->getCombinations($candidates, $target, []);

        return $this->sums;
    }

    private function getCombinations($candidates, $target, $combination) {
        if ($target == 0) {
            sort($combination);
            $this->sums[implode(',',$combination)] = $combination;
            return;
        }
        foreach ($candidates as $candidate) {
            if ($target - $candidate < 0) {
                break;
            }
            $this->getCombinations($candidates, $target - $candidate, array_merge($combination, [$candidate]));
        }
    }
}