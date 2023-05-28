<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        if (empty($nums)) {
            return [[]];
        }
        $length = count($nums);
        $num = array_shift($nums);
        $combinations = $this->permute($nums);
        $newCombinations = [];
        foreach ($combinations as $combination) {
            for ($i = 0; $i < $length; $i++) {
                $newCombinations[] = array_merge(
                    array_slice($combination, 0, $i),
                    array($num),
                    array_slice($combination, $i)
                );
            }
        }
        return $newCombinations;
    }
}