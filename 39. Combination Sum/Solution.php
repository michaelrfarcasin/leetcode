<?php

class Solution {
    private $sums = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        $keyedCandidates = array_combine($candidates, $candidates);
        $this->getCombinations($keyedCandidates, $target, []);

        return $this->sums;
    }

    private function getCombinations($candidates, $target, $combination) {
        if ($candidates[$target]) {
            $combination[] = $target;
            sort($combination);
            $this->sums[implode(',',$combination)] = $combination;
            return;
        }
        if ($target < 2 || empty($candidates)) {
            return;
        }
        foreach ($candidates as $candidate) {
            $this->getCombinations($candidates, $target - $candidate, array_merge($combination, [$candidate]));
        }
    }
}