<?php

class Solution {

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {
        $cityToProvince = [];
        $provinceToCity = [];
        $numberCities = count($isConnected);
        for ($i = 0; $i < $numberCities; $i++) {
            $cityToProvince[$i] = $i;
            $provinceToCity[$i][$i] = $i;
        }
        for ($i = 1; $i < $numberCities; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if (!$isConnected[$i][$j] || $cityToProvince[$i] == $cityToProvince[$j]) {
                    continue;
                }
                $province = $cityToProvince[$j];
                $otherProvince = $cityToProvince[$i];
                foreach ($provinceToCity[$otherProvince] as $city) {
                    $provinceToCity[$province][$city] = $city;
                    $cityToProvince[$city] = $province;
                }
                unset($provinceToCity[$otherProvince]);
            }
        }

        return count($provinceToCity);
    }

    private function dumpProvinces($provinceToCity) {
        foreach ($provinceToCity as $province => $cities) {
            var_dump("    $province => ". implode(',',$cities));
        }
    }
}