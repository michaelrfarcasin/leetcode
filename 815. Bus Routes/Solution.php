<?php

class Solution {

    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     */
    function numBusesToDestination($routes, $source, $target) {
        if ($source == $target) {
            return 0;
        }
        $bussesByStop = $this->getBussesByStop($routes);
        $length = $this->search($routes, $source, $target, $bussesByStop, [$source => true], []);

        return $length == INF ? -1 : $length;
    }

    private function getBussesByStop($routes) {
        $bussesByStop = [];
        foreach ($routes as $bus => $route) {
            foreach ($route as $stop) {
                $bussesByStop[$stop][] = $bus;
            }
        }

        return $bussesByStop;
    }

    private function search($routes, $source, $target, $bussesByStop, $stopsSeen, $bussesRidden) {
        if ($source == $target) {
            return count($bussesRidden);
        }
        $minLength = INF;
        while (!empty($bussesByStop[$source])) {
            $bus = array_shift($bussesByStop[$source]);
            $bussesRidden[$bus] = true;
            while (!empty($routes[$bus])) {
                $stop = array_shift($routes[$bus]);
                if ($stopsSeen[$stop]) {
                    continue;
                }
                // var_dump($source . ' (' . implode(',',array_keys($bussesRidden)) . ") => (" . implode(',',array_keys($stopsSeen)) .") => $bus,$stop [" . implode(',',$routes[$bus]) . "]");
                $stopsSeen[$stop] = true;
                $thisBusIndex = array_search($bus, $bussesByStop[$stop], true);
                unset($bussesByStop[$stop][$thisBusIndex]);
                $length = $this->search($routes, $stop, $target, $bussesByStop, $stopsSeen, $bussesRidden);
                $minLength = min($length, $minLength);
            }
            unset($bussesRidden[$bus]);
        }

        return $minLength;
    }

    private function dumpHashMap($hashMap) {
        foreach ($hashMap as $key => $mappings) {
            var_dump("$key => " . implode(',',$mappings));
        }
        var_dump('');
    }
}