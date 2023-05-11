<?php

class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     * @source kwu30 in Discussion comments
     */
    function leastInterval($tasks, $n) {
        $frequencies = array_count_values($tasks);
        $maxFrequency = 0;
        $numberWithMaxFrequency = 0;
        foreach ($frequencies as $task => $frequency) {
            if ($frequency > $maxFrequency) {
                $maxFrequency = $frequency;
                $numberWithMaxFrequency = 1;
            } elseif ($frequency == $maxFrequency) {
                $numberWithMaxFrequency++;
            }
        }
        $numberTasks = count($tasks);
        $leastIntervalForMaxFrequencyTasks = ($maxFrequency - 1) * ($n + 1) + $numberWithMaxFrequency;

        return max($numberTasks, $leastIntervalForMaxFrequencyTasks);
    }
}