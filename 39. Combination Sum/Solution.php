<?php

class Solution {
    private $combinations = [];
    private $candidates = [];
    private $target = 0;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     * @source https://youtu.be/GBKI9VSKdGg
     */
    function combinationSum($candidates, $target) {
        sort($candidates);
        $this->candidates = $candidates;
        $this->target = $target;
        $this->getCombinations(0, [], 0);

        return $this->combinations;
    }

    private function getCombinations($i, $combination, $total) {
        if ($total == $this->target) {
            $this->combinations[] = $combination;
            return;
        }
        if ($i >= count($this->candidates) || $total > $this->target) {
            return;
        }
        $candidate = $this->candidates[$i];
        $this->getCombinations($i, array_merge($combination, [$candidate]), $total + $candidate);
        $this->getCombinations($i + 1, $combination, $total);
    }
}