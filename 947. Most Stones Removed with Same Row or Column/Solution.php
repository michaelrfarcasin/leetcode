<?php

class UnionFind {
    public array $parent = [];
    public array $rank = [];

    public function __construct(int $size) {
        for ($i = 0; $i < $size; $i++) {
            $this->parent[$i] = $i;
        }
        $this->rank = array_fill(0, $size, 0);
    }

    public function find(int $x): int {
        if ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }

        return $this->parent[$x];
    }

    public function unionSet(int $x, int $y): void {
        $xSet = $this->find($x);
        $ySet = $this->find($y);
        if ($xSet == $ySet) {
            return;
        }
        if ($this->rank[$xSet] < $this->rank[$ySet]) {
            $this->parent[$xSet] = $ySet;
        } elseif ($this->rank[$xSet] > $this->rank[$ySet]) {
            $this->parent[$ySet] = $xSet;
        } else {
            $this->parent[$ySet] = $xSet;
            $this->rank[$xSet]++;
        }
    }
}

class Solution {

    /**
     * @param Integer[][] $stones
     * @return Integer
     */
    function removeStones($stones) {
        $numberStones = count($stones);
        $dsu = new UnionFind($numberStones);
        $numberOfComponents = $numberStones;
        for ($i = 0; $i < $numberStones; $i++) {
            for ($j = $i + 1; $j < $numberStones; $j++) {
                if ($this->coordinatesShareAnAxis($stones[$i], $stones[$j]) && $dsu->find($i) != $dsu->find($j)) {
                    $numberOfComponents--;
                    $dsu->unionSet($i, $j);
                }
            }
        }

        return $numberStones - $numberOfComponents;
    }

    private function coordinatesShareAnAxis($a, $b) {
        return $a[0] == $b[0] || $a[1] == $b[1];
    }
}