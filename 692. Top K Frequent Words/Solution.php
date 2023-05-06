<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k) {
        $frequencies = $this->getSortedFrequencies($words);
        return array_keys(array_slice($frequencies, 0, $k));
    }

    private function getSortedFrequencies($inputs) {
        $frequencies = $this->getFrequenciesByInput($inputs);
        arsort($frequencies);
        $frequencies = $this->sortSameFrequenciesByKey($frequencies);

        return $frequencies;
    }

    private function getFrequenciesByInput($inputs) {
        $frequencies = [];
        foreach ($inputs as $input) {
            $frequencies[$input]++;
        }

        return $frequencies;
    }

    private function sortSameFrequenciesByKey($frequencies) {
        $sorted = $unsorted = [];
        $currentFrequency = reset($frequencies);
        foreach ($frequencies as $input => $frequency) {
            if ($currentFrequency == $frequency) {
                $unsorted[$input] = $frequency;
                continue;
            }
            ksort($unsorted, SORT_STRING);
            $sorted += $unsorted;
            $unsorted = [$input => $frequency];
            $currentFrequency = $frequency;
        }
        ksort($unsorted);
        $sorted += $unsorted;
        $unsorted = [];

        return $sorted;
    }
}