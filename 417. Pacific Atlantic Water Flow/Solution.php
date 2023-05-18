<?php

class Solution {
    private $result = [];
    private $pacific = [];
    private $atlantic = [];
    private $heights = [];
    private $rows = 0;
    private $cols = 0;

    /**
     * @param Integer[][] $heights
     * @return Integer[][]
     * @source https://leetcode.com/problems/pacific-atlantic-water-flow/solutions/2508683/runtime-146-ms-memory-usage-22-9-mb/
     */
    function pacificAtlantic($heights) {
        $this->heights = $heights;
        $this->rows = count($heights);
        $this->cols = count(reset($heights));
        for ($i = 0; $i < $this->rows; $i++) {
            $this->dfs($this->pacific, $i, 0);
            $this->dfs($this->atlantic, $i, $this->cols - 1);
        }
        for ($i = 0; $i < $this->cols; $i++) {
            $this->dfs($this->pacific, 0, $i);
            $this->dfs($this->atlantic, $this->rows - 1, $i);
        }

        return $this->result;
    }

    private function dfs(&$visited, $row, $col) {
        if ($row < 0 || $col < 0 || $row >= $this->rows || $col >= $this->cols || $visited[$row][$col]) {
            return;
        }
        $visited[$row][$col] = true;
        if ($this->atlantic[$row][$col] && $this->pacific[$row][$col]) {
            $this->result[] = [$row, $col];
        }
        $heights = $this->heights;
        foreach ([[-1, 0], [1, 0], [0, -1], [0, 1]] as $adjacent) {
            $adjacentRow = $row + $adjacent[0];
            $adjacentCol = $col + $adjacent[1];
            if ($heights[$adjacentRow][$adjacentCol] >= $heights[$row][$col]) {
                $this->dfs($visited, $adjacentRow, $adjacentCol);
            }
        }
    }

    private function displayOceans() {
        for ($i = 0; $i < $this->rows; $i++) {
            var_dump(implode(',',$this->pacific[$i]) . ' ' .implode(',',$this->atlantic[$i]));
        }
        var_dump('');
    }
}