<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     * @source https://leetcode.com/problems/top-k-frequent-words/solutions/2722266/php-solution-not-the-best-but-works/
     */
    function topKFrequent($words, $k) {
        $frequencies = $this->getSortedFrequencies($words);
        $wordsByFrequency = $this->getWordsByFrequency($frequencies);
        foreach ($wordsByFrequency as $key => $words) {
            sort($words);
            $wordsByFrequency[$key] = $words;
        }
        $sortedWords = $this->flatten($wordsByFrequency);
        return array_slice($sortedWords, 0, $k);
    }

    private function getSortedFrequencies($inputs) {
        $frequencies = array_count_values($inputs);
        arsort($frequencies);

        return $frequencies;
    }

    private function getWordsByFrequency($frequencies) {
        $wordsByFrequency = [];
        foreach ($frequencies as $word => $frequency) {
            $wordsByFrequency[$frequency][] = $word;
        }

        return $wordsByFrequency;
    }

    /** @source https://stackoverflow.com/a/1320156/2037065 */
    private function flatten(array $array) {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }
}