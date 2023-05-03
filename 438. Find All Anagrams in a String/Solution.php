<?php

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     * @source Discusssion comments
     */
    function findAnagrams($s, $p) {
        $anagramIndexes = [];
        $pLength = strlen($p);
        $lengthDifference = strlen($s) - $pLength;
        $sLetters = str_split($s);
        $pLetters = str_split($p);
        $sFrequencies = $this->getLetterFrequencies(array_slice($sLetters, 0, $pLength));
        $pFrequencies = $this->getLetterFrequencies($pLetters);
        if ($sFrequencies == $pFrequencies) {
            $anagramIndexes[] = 0;
        }
        for ($i = 0; $i <= $lengthDifference; $i++) {
            $previousLetter = $sLetters[$i];
            $nextLetter = $sLetters[$i + $pLength];
            $sFrequencies[$previousLetter]--;
            $sFrequencies[$nextLetter]++;
            if ($sFrequencies == $pFrequencies) {
                $anagramIndexes[] = $i + 1;
            }
        }

        return $anagramIndexes;
    }

    private function getLetterFrequencies($s) {
        $frequencies = array_fill_keys(str_split('abcdefghijklmnopqrstuvwxyz'), 0);
        foreach ($s as $letter) {
            $frequencies[$letter]++;
        }

        return $frequencies;
    }
}