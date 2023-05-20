<?php

class Point {
    public $bus;
    public $depth;

    public function __construct($bus, $depth) {
        $this->bus = $bus;
        $this->depth = $depth;
    }
}

class Solution {

    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     * @source Editorial
     */
    function numBusesToDestination($routes, $source, $target) {
        if ($source == $target) {
            return 0;
        }
        $routes = array_map(function ($route) { sort($route); return $route; }, $routes);
        $graph = $this->buildBusGraph($routes);
        $seen = $targets = [];
        $queue = new SplQueue();
        $n = count($routes);
        for ($bus = 0; $bus < count($routes); $bus++) {
            if (array_search($source, $routes[$bus], true) !== false) {
                $seen[$bus] = true;
                $queue->enqueue(new Point($bus, 0));
            }
            if (array_search($target, $routes[$bus], true) !== false) {
                $targets[$bus] = true;
            }
        }
        while (!$queue->isEmpty()) {
            $info = $queue->dequeue();
            $bus = $info->bus;
            $depth = $info->depth;
            if ($targets[$bus]) {
                return $depth + 1;
            }
            foreach ($graph[$bus] as $nextBus) {
                if (!$seen[$nextBus]) {
                    $seen[$nextBus] = true;
                    $queue->enqueue(new Point($nextBus, $depth + 1));
                }
            }
        }

        return -1;
    }

    private function buildBusGraph(array $routes): array {
        $n = count($routes);
        $graph = [];
        for ($i = 0; $i < $n; ++$i) {
            for ($j = $i + 1; $j < $n; ++$j) {
                if ($this->intersect($routes[$i], $routes[$j])) {
                    $graph[$i][] = $j;
                    $graph[$j][] = $i;
                }
            }
        }

        return $graph;
    }

    private function intersect(array $a, array $b): bool {
        $i = $j = 0;
        $aLength = count($a);
        $bLength = count($b);
        while ($i < $aLength && $j < $bLength) {
            if ($a[$i] == $b[$j]) {
                return true;
            }
            if ($a[$i] < $b[$j]) {
                $i++;
            } else {
                $j++;
            }
        }

        return false;
    }
}